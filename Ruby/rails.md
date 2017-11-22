# Basics

Source: https://docs.docker.com/compose/rails/#build-the-project

## Installing

- Dockerfile

```ruby
FROM ruby:2.3.3
RUN apt-get update -qq && apt-get install -y build-essential libpq-dev nodejs
RUN mkdir /myapp
WORKDIR /myapp
COPY Gemfile /myapp/Gemfile
COPY Gemfile.lock /myapp/Gemfile.lock
RUN bundle install
COPY . /myapp
```

- Gemfile

```ruby
source 'https://rubygems.org'
gem 'rails', '5.0.0.1'
```

- Gemfile.lock

initially empty

- docker-compose.yml

```yml
version: '3'
services:
  db:
    image: postgres
  web:
    build: .
    command: bundle exec rails s -p 3000 -b '0.0.0.0'
    volumes:
      - .:/myapp
    ports:
      - "3000:3000"
    depends_on:
      - db
```

## Create new project

`docker-compose run web rails new . --force --database=postgresql`

