# Install cron
apt-get update -qq && apt-get install cron -yqq
service cron start

(crontab -l 2>/dev/null; echo "* * * * * /home/site/wwwroot/.azure/test.sh")|crontab
