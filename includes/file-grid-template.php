<?php
// Fetch files based on selected category (if any)
$selected_category = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;
$files = c5c_get_files($selected_category);
?>

<div class="c5c-file-grid">
    <?php if ($files): ?>
        <?php foreach ($files as $file): ?>
        
            <div class="c5c-file-item">
                <img src="<?php echo esc_url($file->file_url); ?>" alt="Thumbnail">
                <h3 class="c5c-file-title"><?php echo esc_html($file->title); ?></h3>
                <p class="c5c-file-description"><?php echo esc_html($file->description); ?></p>
                <a href="<?php echo esc_url(home_url('/' . urlencode($file->title) . '/')); ?>" class="c5c-view-file">View Details</a>
                <?php echo '<pre>'; print_r($file->id); echo '</pre>'; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No files found for the selected category.</p>
    <?php endif; ?>
</div>
