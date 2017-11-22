# Basics

Source: https://docs.docker.com/compose/rails/#build-the-project

Rails is using Docker to run the Rails Server.

## 1. Installing

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

## 2. Create new project

`docker-compose run web rails new . --force --database=postgresql`

the project is now created in your folder, but all files are owned by *root*, so you need to overwrite them to your username to be able to edit them

`sudo chown -R $USER:$USER .`

### 2.1. Database

the database configurations are stored in `config/database.yml`, its contents need to be replaced

```yml
default: &default
  adapter: postgresql
  encoding: unicode
  host: db
  username: postgres
  password:
  pool: 5

development:
  <<: *default
  database: myapp_development


test:
  <<: *default
  database: myapp_test
```

the app is now ready to boot

`docker-compose up`

### 2.2 Rake

Rake executes tasks we set up for the application.

`docker-compose run web rake routes`

this returns the currently available routes

`docker-compose run web rake db:create`

command to create the database

`docker-compose run web rake db:migrate`

after creating new migrations, it is necessary to tell rake to execute the migrations before we proceed to run the application again

## 3. The directory

### 3.1. Config

- environments (production, development, test)
- routes: available routes in the application, generated components are automatically added here

### 3.2. App

This is the actual content of the application. Rails is using an MVC model for its components, which can be found in their own directories.

#### 3.2.1. Assets

This contains the javascript/coffeescript and the stylesheets, images and fonts we are using.

#### 3.2.2. Models

`application_record.rb` is a base abstract class, it is not connected to a database entity, but every other class inherits this, so everything that is common is every other class, goes here

#### 3.2.3. Controllers

`application_controller.rb` an the base parent controller

#### 3.2.4. Views

Contains html files with ruby insertions.

#### 3.2.5. Mailers

Email sender component.

#### 3.2.6. Jobs

Jobs to be run in the background, anything that can be executed asyncronously by a worker.

## 4. Creating new components

`docker-compose run web rails g controller home`

creates a controller named `home`, rails will also advise you if it thinks you should create other related components as well

`docker-compose run web rails g views:home`

## 5. Rails console

We can open up a rails console through docker. In the console, you can run ruby scripts directly

`docker-compose run web rails c`

## 6. Gems

Gems are predefined micro applications created for ruby

### 6.1. Devise

User management component.

`docker-compose run web rails g devise User`

creates a devise component for the user, automatically generates the related models, controllers and migrations
