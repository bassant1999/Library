{extends file="{$smarty.const.VIEW_TPL_PATH}/views/layout.tpl"}
{block name=title}Login{/block}
{block name=body}
        <div class="container">
            <h2>LOGIN</h2>
            <form class="form-horizontal">
                <div class="alert alert-danger" v-if = "status">
                    <strong>Wrong Email or Password</strong> 
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="user_name">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="user_name" v-model="user_name">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">    
                    <input class="form-control" type="password" name="password" v-model="password">
                </div>
                </div>
                <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                </div>
                </div>
                <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" @click="login()" value="Login" class="btn btn-default">                      
                </div>
                </div>
            </form>
        </div>            
    <div>
    <script type="text/javascript" src="http://localhost/MVC/app/views/js/login.js"></script>  
{/block}
    

          


