# Amazon Review Notifier
A Simple php script that checks for new reviews for an Amazon product and sends Email.

After releasing my Debut Novel: [One Person's Craziness](https://www.amazon.com/One-Persons-Craziness-R-T-Ojas-ebook/dp/B01BGFBUC4), I quickly found myself in a dilemma. I always wanted to instantly know when a new Review has been posted to Amazon. But since Amazon had no built in way of notifying me, I took matter into my own hands and wrote a php script to do this.

What this script does is it scrapes the html from the product page, determines the total review count, and then updates my database with the review count. The script is then periodically ran (via a cron job). And when the Review Count has increased, it shoots out an email to me.

