FROM mysql:5.7-debian

RUN apt-get update && \
    apt-get install -y locales &&\
    rm -fr /var/lib/apt/lists/* && \
    echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen && \
    locale-gen ja_JP.UTF-8

ENV LC_ALL ja_JP.UTF-8

RUN { \
    echo '[mysqld]'; \
    echo 'explicit_defaults_for_timestamp = 1'; \
    echo 'character-set-server=utf8mb4'; \
    echo 'collation-server=utf8mb4_general_ci'; \
    echo '[client]'; \
    echo 'default-character-set=utf8mb4'; \
} > /etc/mysql/conf.d/charset.cnf

COPY ./config/my.cnf /etc/mysql/conf.d/

EXPOSE 3306
CMD ["mysqld"]
