<!DOCTYPE html>
<html>
    <head>
        <title>{$title|default:"no title"}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{$ROOT}/assets/css/style.css">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="http://localhost/MVC/public/">Library</a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="http://localhost/MVC/public/">Home</a></li>
                    {if !isset($login) || $login == 0 }
                        <li><a href="http://localhost/MVC/public/pages/login/login_view">Login</a></li>
                    {elseif $login == 1 and $user_type == 0}
                        <li><a  href="http://localhost/MVC/public/pages/addbook/add_book_view">Add Book</a></li>
                        <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
                    {else}
                        <li><a @click="borrowed_books()">Borrowed Books</a></li>
                        <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
                    {/if}
                    </ul>
                    <form class="navbar-form navbar-left" action="search" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name = "book_title" placeholder="Search For Book" v-model="sbook_title">
                    </div>
                    <button type="submit" class="btn" style="margin-left: 4px;">Search</button>
                    </form>
                </div>
            </nav>
        </header>        