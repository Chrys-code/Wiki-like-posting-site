# Wiki-like-posting-site
php &amp; mysql

This is a Wiki-like posting system, using MySQL, PHP and a bit of ajax and css.
Contains a login facility with session variables such as user and admin status.
Main page is visible to anyone such as a real life site, but for functionality login is required.

Main page is a search surface that returns any matching data using php through ajaxrequest that replaces
the content of a "response" div with the response from the server that is converted to JSON.
Returned data is a place with short informations such as name, country, region, description and number of recommendations.

Facilities:
- Login (session: user + adminstatus)
- Search by region without reload (Ajax request)
- Write a new POI (Database also stores username who wrote the POI)
- Recommend POIs
- Write reviews about POIs
- Admin approval required before a review is published
- Admin facility is secured
- Database connection is secured (placeholders, tokens, prepared queries)
- Some scripts are overwritten in Object Oriented PHP
- OOPs are using Data Access Objects
