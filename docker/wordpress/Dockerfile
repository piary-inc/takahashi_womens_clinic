FROM wordpress:6.9.1-php8.4-apache

# msmtpインストール (MailHog連携用)
RUN apt-get update && \
    apt-get install -y msmtp msmtp-mta && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# msmtp設定ファイルをコピー
COPY msmtprc /etc/msmtprc
RUN chmod 644 /etc/msmtprc

# PHPのsendmailパスをmsmtpに設定
RUN echo "sendmail_path = /usr/bin/msmtp -t" > /usr/local/etc/php/conf.d/sendmail.ini
