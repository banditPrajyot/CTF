# Sets the base image for subsequent instructions
FROM ubuntu:latest
# Sets the working directory in the container  
WORKDIR /app
RUN apt-get update -y
RUN apt-get install -y python3 python3-pip
# Copies the dependency files to the working directory
COPY requirements.txt /app/requirements.txt
# Install dependencies
RUN python3 -m pip install -r requirements.txt
# Fix `Module 'collections' has no attribute 'MutableMapping'
RUN pip install --upgrade pip wheel setuptools requests
# Copies everything to the working directory
COPY . /app
# Command to run on container start    
CMD [ "python3" , "./app.py" ]