FROM ubuntu:15.04
RUN apt-get update
RUN apt-get install python python-dev python-pip python-scrapy python-requests -y
RUN apt-get install redis-server -y
RUN pip install redis
RUN apt-get install nginx -y
ADD ./ /src
ADD nginx-conf /etc/nginx/sites-enabled/default
CMD sh -c 'cd /src && sh run.sh'
EXPOSE 80



安装python
sudo apt-get install python
sudo apt-get install build-essential
sudo apt-get install python-dev
sudo apt-get install libevent-dev
sudo apt-get install libxml2-dev
sudo apt-get install libxslt1-dev
sudo apt-get install python-pip
sudo apt-get install python-requests
sudo apt-get install python-setuptools

安装Twisted
sudo easy_install Twisted

安装w3lib
sudo easy_install -U w3lib

安装lxml
sudo easy_install lxml

安装 OpenSSL
sudo easy_install OpenSSL

安装scrapy
sudo easy_install -U Scrapy

安装redis
sudo apt-get install redis-server -y

安装python  redis
pip install redis


