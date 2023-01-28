from flask import Flask, request, render_template
from lxml import etree
import pokepy
import string

app = Flask(__name__)

@app.route('/', methods=['POST', 'GET'])
def blindxml():
    if request.method == 'POST':
      allowed_chars = set(string.ascii_lowercase + string.ascii_uppercase)
      xml = request.data
      parser = etree.XMLParser(no_network=False) # to enable network resources
      try:
        query = etree.fromstring(xml, parser)
        parsed_xml = etree.tostring(query).decode('UTF-8')
        print(parsed_xml)
        name = query.find('name').text
        if set(name) <= allowed_chars:
          pokemon = pokepy.V2Client().get_pokemon(name)[0]
          data = f"""
          <div>
            <img src='{pokemon.sprites.front_default}' width=300px height=300px/>
            <p id='id'><b>ID:</b> {pokemon.id}</p>
            <p id='name'><b>NAME:</b> {pokemon.name}</p>
            <p id='height'><b>HEIGHT:</b> {pokemon.height}</p>
            <p id='weight'><b>WEIGHT:</b> {pokemon.weight}</p>
            <p id='types'><b>TYPES:</b> {', '.join(t.type.name for t in pokemon.types)}</p>
            <p id='abilities'><b>ABILITIES:</b> {', '.join(ability.ability.name for ability in pokemon.abilities)}</p>
          </div>
          """
          return data
        else:
          raise Exception
      except Exception as e:
        print(e)
        return "No Pokemon "+ name
    else:
      return render_template('index.html')
if __name__ == '__main__':
    app.run(host='0.0.0.0')
