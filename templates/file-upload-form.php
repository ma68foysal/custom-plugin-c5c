<?php
$categories = c5c_get_categories(); // Fetch categories
$subcategories = c5c_get_subcategories(); // Fetch subcategories
?>

<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="c5c_file_upload">

    <label for="file_title">File Title:</label>
    <input type="text" name="file_title" required>

    <label for="file_description">File Description:</label>
    <textarea name="file_description"></textarea>

    <label for="category_id">Category:</label>
    <select name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo esc_attr($category->id); ?>"><?php echo esc_html($category->category_name); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="subcategory_id">Subcategory:</label>
    <select name="subcategory_id" required>
        <?php foreach ($subcategories as $subcategory): ?>
            <option value="<?php echo esc_attr($subcategory->id); ?>"><?php echo esc_html($subcategory->subcategory_name); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="file">Upload File:</label>
    <input type="file" name="file" required>

    <button type="submit">Upload</button>
</form>

<!-- Modal Structure for Popup -->
<div id="uploadSuccessModal" style="display: none;">
    <div class="modal-content">
        <h4>Upload Successful</h4>
        <p>Your file has been uploaded successfully.</p>
        <button id="closeModal">Close</button>
    </div>
</div>