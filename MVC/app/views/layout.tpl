<!DOCTYPE html>
<html>
    <head>
        <title>{block name=title}Default Title{/block}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{$ROOT}/assets/css/style.css">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>
    <body>
        <div id="app">
            <!-- header -->
            <header>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                        <a class="navbar-brand">Library</a>
                        </div>
                        <ul class="nav navbar-nav">
                        <li :class="{ active: whoActive == 0 }"><a href="http://localhost/MVC/public/">Home</a></li>
                       
                        {if !isset($login) || $login == 0 }
                            <li :class="{ active: whoActive == 1 }"><a href="http://localhost/MVC/public/pages/login/login_view">Login</a></li>
                        {elseif $login == 1 and $user_type == 0}
                            <li :class="{ active: whoActive == 2 }"><a  href="http://localhost/MVC/public/pages/addbook/add_book_view">Add Book</a></li>
                            <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
                        {else}
                            <li :class="{ active: whoActive == 3 }"><a @click="borrowed_books()">Borrowed Books</a></li>
                            <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
                        {/if}
                        {block name="additional"}{/block}
                        </ul>
                        
                    </div>
                </nav>
            </header>      
            {block name=body}Default Body{/block} 
        </div>   
        {block name=component}{/block}
    </body>
</html>