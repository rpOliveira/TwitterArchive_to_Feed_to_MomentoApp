#Old Tweets -> Momento App

1) Download your twitter archive. The files you will need are in tweets/data/js/tweets

2) Choose which files you want to import (you'll probably just want to import the old tweets that are not in the Momento's database).

3) Run the **tunearchive.sh** script in the same folder (it will change the original files).

4) Copy the resulting **old_tweets.js** to your server and the **twitter_archive_feed.php** file (after editing your server url in the line $server = 'YOUR SERVER URL HERE';)

5) The feed url will be [YOUR_SERVER_URL]/twitter_archive_feed.php

6) Add the web feed in the Momento app. It may take a while to import all tweets.

###Configuration

You may want to eliminate the feed items' titles. That will prevent the duplicate view of the tweet in the day view (title+content). I prefer to haver the titles so in the feed view I can see all the tweets imported (only the titles are shown there). 


