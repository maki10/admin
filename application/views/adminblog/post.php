<div class="admin-header">
	<h1><?php echo $this->view->post['title'] ? $this->view->post['title'] : "Create" ?></h1>
	<span class="last-update"></span>
</div>

<div class="admin-content">
    <?php Alert::show() ?>

	<form action="admin-blog/save/<?php echo !empty($this->view->post['id']) ? $this->view->post['id'] : 'new' ?>" method="post" enctype="multipart/form-data">

		<label>Title</label>
		<input type="text" name="title" value="<?php echo $this->view->post['title'] ?>">

		<label>Url</label>
		<input type="text" name="uri_id" value="<?php echo $this->view->post['uri_id'] ?>">

		<label>Excerpt</label>
		<textarea name="excerpt" rows="5"><?php echo $this->view->post['excerpt'] ?></textarea>

		<label>Content</label>
		<textarea name="content" class="htmlEditor" rows="15" data-page-name="blog" data-page-id="<?php echo $this->view->post['id'] ?>" id="editor-<?php echo  str_replace('.', '', $this->view->post['id'])  ?>"><?php echo $this->view->post['content'] ?></textarea>

		<div class="cf">
			<label>Blog Category</label>
			<div class="select-style">
				<select name="blog_category_id">
						<option value="0">Choose category</option>
					<?php foreach ($this->view->categories as &$category): ?>
						<option value="<?php echo $category['id'] ?>" <?php if ($category['id']==$this->view->post['blog_category_id']): ?> selected <?php endif ?>><?php echo $category['title'] ?></option>
					<?php endforeach ?>
				</select>				
			</div>
		</div>

		<label>Thumbnail</label>
		<div class="file-input-wrap cf">
			<?php if(!empty($this->view->post['thumb'])): ?>
				<div class="small-image-preview" style="background-image: url(<?php echo $this->view->post['thumb'] ?>)"></div>
				<input type="checkbox" name="delete_thumb" value="1">Delete this file?
			<?php else: ?>
				<div class="fileUpload">
					<span>Choose file</span>
					<input type="file" name="elements[thumb]"/>
				</div>
			<?php endif ?>
		</div>

		<label>PDF</label>
		<div class="file-input-wrap cf">
			<?php if(!empty($this->view->post['pdf'])): ?>
				<a href="<?php echo $this->view->post['pdf'] ?>"><div class="small-image-preview" style="background-image: url('public/admin/css/images/pdf-icon.svg')"></div></a>
				<input type="checkbox" name="delete_pdf" value="1">Delete this file?
			<?php else: ?>
				<div class="fileUpload">
					<span>Choose file</span>
					<input type="file" name="elements[pdf]"/>
				</div>
			<?php endif ?>
		</div>

		<label>SEO Title</label>
		<input type="text" name="meta_title" value="<?php echo $this->view->post['meta_title'] ?>">

		<label>SEO Description</label>
		<input type="text" name="meta_description" value="<?php echo $this->view->post['meta_description'] ?>">

		<label>SEO Keywords</label>
		<input type="text" name="meta_keyword" value="<?php echo $this->view->post['meta_keyword'] ?>">

		<label>Visible</label>
		<div class="select-style">
			<select name="visible">
				<option value="0" <?php if(!$this->view->post['visible']): ?> selected <?php endif ?>>Not Visible</option>
				<option value="1" <?php if($this->view->post['visible']): ?> selected <?php endif ?>>Visible</option>
			</select>				
		</div>

		<div class="cf"></div>

		<input type="submit" value="Save" class="save-item">

		<?php if (!empty($this->view->post['id'])): ?>
			<a class="button remove-item" href="admin-blog/remove/<?php echo $this->view->post['id'] ?>">Delete</a>
		<?php endif ?>

	</form>
	
</div>