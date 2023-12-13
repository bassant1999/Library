# Library

## Description
The user can view books, search for books, borrow and return a book, and view his/her borrowed books.\
The admin can view books, search for books, and add new books.

## Database 
![image](https://github.com/bassant1999/Library/assets/72526468/21f1503c-9649-489b-9680-1c8e2d367621)

the database format is in dB.sql

## paths:
**Home page** -> http://HostName/MVC/public/ \
**Login page** -> http://HostName/MVC/public/pages/login/login_view \
**Login Api** -> http://HostName/MVC/public/services/login/login \
**Logout Api** -> http://HostName/MVC/public/services/logout  \
**Return book Api** -> http://HostName/MVC/public/services/books/return_book?bookId=1&userId=4 \
**Borrow book Api** -> http://HostName/MVC/public/services/books/borrow_book?bookId=1&userId=4 \
**Search book Api** -> http://HostName/MVC/public/services/books/search?bookTitle=Sherlok Holmes \
**View books Api** -> http://HostName/MVC/public/services/books/get_books \
**View Borrowed books Api** -> http://HostName/MVC/public/services/books/borrowed_books \
**Add Book page** -> http://HostName/MVC/public/pages/addbook/add_book_view \
We have three pages; **Home page**, **Login page**, and **Add Book page**.

## Configurations
All configurations are in app/core/config.php, customize the values of DBNAME, DBHOST, DBUSER, DBPASS, DBDRIVER, and ROOT \
Put MVC folder in wamp to try it.

## Technologies
**Backend**: PHP MVC, adodb active record php, and smarty.\
**Frontend**: Vue js and smarty. 

### Power of MVC:
The logic is separated from UI. \
The logic of DB is done in the model while controller just use the models so if any change is done in the models, no need to change anything in controllers and UI/views. \
We have two types of controllers in the project which are services and pages; services contain the logic while pages view/diplay the views. \
The models use ADODB active record class. 
we have home page, login page, and add book page (we will have three page controllers), so put them in pages where Home render home view,...etc.
For services, add service for books to contain all logic/requests handling done on books, service for users to contain all logic/requests handling done on users such as sign up, sign in,...etc.


### Power of vue:
The change in any state[ref or reactive] (like books state in home.js) is reflected directly on UI.

### Power of smarty:
Separate the presenation from logic in the view (no need to write php code in the view, just do the logic and send the content to the view to present it)

## References

### Reference to MVC:
https://youtu.be/q0JhJBYi4sw

### Reference to vue:
https://vuejs.org/tutorial/#step-1 \
--> I used composition and no SFC (just HTML)
![image](https://github.com/bassant1999/Library/assets/72526468/e4e35b1b-3c8f-44a2-a14a-e1cda537f448)


### Reference to php and vue full stack:
https://www.youtube.com/playlist?list=PLUoIt0OrSPCsrvjwFjrhKBbgvhA5W8Iwi
https://phpforever.com/vuejs/login-example-in-vuejs-and-php/
https://www.youtube.com/watch?v=S9lPjUf1VLI&t=477s
https://www.youtube.com/watch?v=Zn4Xa406lJo&t=280s
https://www.youtube.com/watch?v=Zn4Xa406lJo
https://www.youtube.com/watch?v=iuZViCeW0JM
https://www.google.com/search?q=vue+and+php+full+stack&sca_esv=585864680&rlz=1C1GCEU_enEG1085EG1085&tbm=vid&sxsrf=AM9HkKn_QSfceVutxPhWZ0Z7rz7IhmoSxg:1701160267091&source=lnms&sa=X&ved=2ahUKEwjV4rPro-aCAxUDzwIHHSEJAf8Q_AUoAXoECAIQAw&biw=1280&bih=603&dpr=1.5#fpstate=ive&vld=cid:c8e217ca,vid:S9lPjUf1VLI,st:0
https://www.google.com/search?q=vue+and+php&sca_esv=585873092&rlz=1C1GCEU_enEG1085EG1085&tbm=vid&sxsrf=AM9HkKkuLLIOX3Tmh5Jp5KWXZVR0uVmWuQ:1701162779695&source=lnms&sa=X&sqi=2&ved=2ahUKEwi448CZreaCAxVqcvEDHZ1pCV0Q_AUoAXoECAEQAw&biw=1280&bih=603&dpr=1.5#fpstate=ive&vld=cid:9f40f504,vid:nJFwvGk0dfM,st:0

### Reference to smarty:
https://www.smarty.net/crash_course

### Reference to adodb active record php: 
https://adodb.org/dokuwiki/doku.php?id=v5:activerecord:activerecord_index


