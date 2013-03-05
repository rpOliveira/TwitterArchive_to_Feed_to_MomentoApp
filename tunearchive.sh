#!/bin/bash 

# Creates a single JSON file with the right format to be converted to a rss feed
# JSON files location in the twitter archive: tweets/data/js/tweets

for files in `ls *.js` 
  do
    sed '1d' -i $files 
    sed '1s/^...//' -i $files
    sed '$d' -i $files    
    echo '},' >> $files
   done

echo '[ ' >> old_tweets.js

for files in `ls *.js`
   do
    cat $files >> old_tweets.js
   done    
   
sed '$d' -i old_tweets.js
echo '} ]' >> old_tweets.js

