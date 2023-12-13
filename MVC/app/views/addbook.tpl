{extends file="{$smarty.const.VIEW_TPL_PATH}/views/layout.tpl"}
{block name=title}ADD{/block}
{block name=body}
    <div>
      <form class="form-horizontal">
        <div class="alert alert-success" v-if = "success_msg == 1">
          <strong>Added Successfully</strong> 
        </div>
        <div class="alert alert-info" v-if = "success_msg == 2">
          <strong>Fill All The Fields</strong>.
        </div>
        <div class="alert alert-info" v-if = "success_msg == 3">
          <strong>Something went wrong. Try Again!</strong>.
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="title">Title:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="title" v-model="objNewBook.title" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="author">Author:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="author" v-model="objNewBook.author">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="description">Description:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="description" v-model="objNewBook.description" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="img_url">Image Url:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="img_url" v-model="objNewBook.img_url" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="max_num">Available number of books:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="max_num" v-model="objNewBook.max_num" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="button" @click="add_book()" value="Add" class="btn btn-default">                     
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="http://localhost/MVC/app/views/js/add_book.js"></script>
{/block}
    










