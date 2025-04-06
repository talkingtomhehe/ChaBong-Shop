<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="card-title mb-4"><?php echo isset($product['id']) ? 'Edit Product' : 'Add New Product'; ?></h5>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php if ($categories && $categories->num_rows > 0): ?>
                                <?php while($category = $categories->fetch_assoc()): ?>
                                    <option value="<?php echo $category['id']; ?>" <?php echo $product['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="featured" name="featured" <?php echo $product['featured'] ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="featured">
                                Featured Product
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <?php if (!empty($product['image'])): ?>
                            <div class="mb-3">
                                <img src="<?php echo SITE_URL . $product['image']; ?>" class="img-fluid img-thumbnail mb-2" alt="Product Image">
                                <input type="hidden" name="current_image" value="<?php echo $product['image']; ?>">
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="image" name="image">
                        <div class="form-text">Recommended size: 600x600px. Max size: 2MB</div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <?php echo isset($product['id']) ? 'Update Product' : 'Add Product'; ?>
                </button>
                <a href="<?php echo SITE_URL; ?>admin/products" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>