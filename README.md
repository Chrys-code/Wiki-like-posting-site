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

Here is a user journey:

Login facility: Logged in as a user.
![wiki-login](https://user-images.githubusercontent.com/55841911/87070526-d3fc1600-c210-11ea-960b-9b88b82b0e3a.png)
Search facility without page reload.
![wiki-search1](https://user-images.githubusercontent.com/55841911/87070533-d6f70680-c210-11ea-99dc-5adb0a032247.png)
Listing POIs: Recommend or Write review(post)
![wiki-search2](https://user-images.githubusercontent.com/55841911/87070537-d8283380-c210-11ea-9320-a22c1ed81f4f.png)
![wiki-ahead-review](https://user-images.githubusercontent.com/55841911/87070546-db232400-c210-11ea-8789-a60fd8e1ac93.png)
Reviews can be seen by any user after admin approval. (Database also stores the publisher (user))
![wiki-ahead-write-review](https://user-images.githubusercontent.com/55841911/87070569-e413f580-c210-11ea-9ec9-6577f01d892f.png)
Write a review -> First appears in admin page
![wiki-writereview-demo](https://user-images.githubusercontent.com/55841911/87070573-e6764f80-c210-11ea-9f89-c98a75a593e6.png)
Confirmation to the user
![wiki-review-confirmation](https://user-images.githubusercontent.com/55841911/87070582-e9714000-c210-11ea-8f63-29bcb9db633d.png)
Admin Login to approve my own post...
![wiki-requires-admin](https://user-images.githubusercontent.com/55841911/87070591-eb3b0380-c210-11ea-954b-1913676680f9.png)
Admin login happened and approve
![wiki-admin-approval](https://user-images.githubusercontent.com/55841911/87070596-ed04c700-c210-11ea-840c-651099ea515b.png)
Confimation to the admin
![wiki-admin-approved](https://user-images.githubusercontent.com/55841911/87070600-eece8a80-c210-11ea-8b35-fc2ccc2c756c.png)
Review now can be seen by any user
![wiki-review-see](https://user-images.githubusercontent.com/55841911/87070603-f0984e00-c210-11ea-9379-619f52c77706.png)
Add new whole POI to New York
![wiki-new-poi](https://user-images.githubusercontent.com/55841911/87070607-f1c97b00-c210-11ea-8d49-2c387509a530.png)
Add new POI facility
![wiki-addnew-poi](https://user-images.githubusercontent.com/55841911/87070635-fd1ca680-c210-11ea-9dc6-d90fe195b48c.png)
Cofirmation to the user
![wiki-new-poi-conf](https://user-images.githubusercontent.com/55841911/87070683-10c80d00-c211-11ea-9d72-f592b4bf13d9.png)
New POI can be seen by any user (however this posting do not require admin approval...)
I added it twice as I missed a screenshot ^.^
![wiki-addedpoi](https://user-images.githubusercontent.com/55841911/87070696-1291d080-c211-11ea-8e47-d3dedc9b959d.png)
