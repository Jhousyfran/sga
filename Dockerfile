FROM jhousyfran/php7-3_apache

RUN curl -LO https://github.com/DataDog/dd-trace-php/releases/latest/download/datadog-setup.php && \
    php datadog-setup.php --php-bin=all --enable-appsec --enable-profiling