services:

  app:
    build:
      context: .
      dockerfile: .docker/Dockerfile

    container_name: sinodtech_app

    restart: unless-stopped

    working_dir: /var/www

    volumes:
      - ./:/var/www

    networks:
      - sinodtech

  nginx:
    image: nginx:alpine

    container_name: sinodtech_nginx

    restart: unless-stopped

    ports:
      - "8080:80"

    volumes:
      - ./:/var/www
      - ./.docker/nginx/conf.d:/etc/nginx/conf.d

    depends_on:
      - app

    networks:
      - sinodtech

  mysql:
    image: mysql:8.0

    container_name: sinodtech_mysql

    restart: unless-stopped

    ports:
      - "3307:3306"

    environment:
      MYSQL_DATABASE: ${DB_DATABASE}
      MYSQL_ROOT_PASSWORD: ${DB_PASSWORD}
      MYSQL_USER: ${DB_USERNAME}
      MYSQL_PASSWORD: ${DB_PASSWORD}

    volumes:
      - mysql_data:/var/lib/mysql

    networks:
      - sinodtech

  phpmyadmin:
    image: phpmyadmin:latest
    container_name: sinodtech_phpmyadmin
    restart: unless-stopped
    environment:
        PMA_HOST: mysql
        PMA_PORT: 3306
    ports:
        - "8081:80"
    depends_on:
        - mysql
    networks:
        - sinodtech


networks:
  sinodtech:
    driver: bridge


volumes:
  mysql_data:
