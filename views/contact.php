<div class="container py-5 mt-5">
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-5 mb-3">Contact Us</h1>
            <p class="lead text-muted">Have questions about our products or services? Reach out to us using the form below or visit our stores.</p>
        </div>
    </div>
    
    <div class="row">
        <!-- Contact Form Column -->
        <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-4">Send Us a Message</h3>
                    
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?php echo SITE_URL; ?>contact">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contact Information Column -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-5">
                    <h3 class="mb-4">Contact Information</h3>
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0 me-3">
                            <i class="bi bi-geo-alt text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5>Address</h5>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($mainLocation['address']); ?></p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0 me-3">
                            <i class="bi bi-telephone text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5>Phone</h5>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($contactInfo['phone']); ?></p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0 me-3">
                            <i class="bi bi-envelope text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5>Email</h5>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($contactInfo['email']); ?></p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0 me-3">
                            <i class="bi bi-clock text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5>Business Hours</h5>
                            <p class="text-muted mb-0"><?php echo $contactInfo['hours']; ?></p>
                        </div>
                    </div>
                    
                    <!-- Social Media Icons -->
                    <div class="mt-4">
                        <h5>Follow Us</h5>
                        <div class="d-flex">
                            <a href="<?php echo htmlspecialchars($contactInfo['social']['facebook']); ?>" class="text-decoration-none me-3" target="_blank">
                                <i class="bi bi-facebook text-primary fs-4"></i>
                            </a>
                            <a href="<?php echo htmlspecialchars($contactInfo['social']['instagram']); ?>" class="text-decoration-none me-3" target="_blank">
                                <i class="bi bi-instagram text-danger fs-4"></i>
                            </a>
                            <a href="<?php echo htmlspecialchars($contactInfo['social']['twitter']); ?>" class="text-decoration-none" target="_blank">
                                <i class="bi bi-twitter text-info fs-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Store Locations (if multiple) -->
            <?php if ($storeLocations && $storeLocations->num_rows > 1): ?>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="mb-3">Our Locations</h4>
                    <div class="accordion" id="locationAccordion">
                        <?php $i = 0; while($location = $storeLocations->fetch_assoc()): $i++; ?>
                        <div class="accordion-item border-0 mb-2">
                            <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse<?php echo $i; ?>" 
                                        aria-expanded="<?php echo ($i === 1) ? 'true' : 'false'; ?>" 
                                        aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo htmlspecialchars($location['name']); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" 
                                 aria-labelledby="heading<?php echo $i; ?>" 
                                 data-bs-parent="#locationAccordion">
                                <div class="accordion-body">
                                    <p><strong>Address:</strong> <?php echo htmlspecialchars($location['address']); ?></p>
                                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($location['phone']); ?></p>
                                    <p><strong>Hours:</strong> <br><?php echo $location['hours']; ?></p>
                                    <button class="btn btn-sm btn-outline-primary mt-2 center-map-btn" 
                                            data-lat="<?php echo $location['latitude']; ?>" 
                                            data-lng="<?php echo $location['longitude']; ?>">
                                        <i class="bi bi-geo-alt me-1"></i> Show on Map
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Google Maps -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div id="map" style="width: 100%; height: 450px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Google Maps JavaScript -->
<script>
let map;
let markers = [];
let infoWindows = [];

function initMap() {
    // Main location coordinates for initial center
    const mainLocation = {
        lat: <?php echo $mainLocation['latitude']; ?>, 
        lng: <?php echo $mainLocation['longitude']; ?>
    };
    
    // Create the map centered on main location
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: mainLocation,
        mapTypeControl: true,
        streetViewControl: true,
        fullscreenControl: true,
    });
    
    // Add markers for all locations
    <?php if ($storeLocations && $storeLocations->num_rows > 0): ?>
        <?php $storeLocations->data_seek(0); // Reset pointer ?>
        <?php while($location = $storeLocations->fetch_assoc()): ?>
            addMarker({
                lat: <?php echo $location['latitude']; ?>,
                lng: <?php echo $location['longitude']; ?>
            }, 
            "<?php echo addslashes($location['name']); ?>",
            "<?php echo addslashes($location['address']); ?>",
            "<?php echo addslashes($location['phone']); ?>",
            "<?php echo addslashes($location['hours']); ?>"
            );
        <?php endwhile; ?>
    <?php else: ?>
        // Just add the main location if no locations in database
        addMarker(
            mainLocation,
            "<?php echo addslashes($mainLocation['name']); ?>",
            "<?php echo addslashes($mainLocation['address']); ?>",
            "<?php echo addslashes($contactInfo['phone']); ?>",
            "<?php echo addslashes($contactInfo['hours']); ?>"
        );
    <?php endif; ?>
    
    // Open the info window for the first marker by default
    if (infoWindows.length > 0) {
        infoWindows[0].open({
            anchor: markers[0],
            map
        });
    }
}

function addMarker(position, name, address, phone, hours) {
    // Create marker
    const marker = new google.maps.Marker({
        position: position,
        map: map,
        title: name,
        animation: google.maps.Animation.DROP
    });
    
    // Format hours for display
    const formattedHours = hours.replace(/<br>/g, '\n');
    
    // Create info window content
    const contentString = `
        <div style="padding: 10px; max-width: 300px;">
            <h5 style="margin-top: 0;">${name}</h5>
            <p style="margin-bottom: 5px;"><strong>Address:</strong><br>${address}</p>
            <p style="margin-bottom: 5px;"><strong>Phone:</strong><br>${phone}</p>
            <p style="margin-bottom: 5px;"><strong>Hours:</strong><br>${hours}</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination=${position.lat},${position.lng}" 
               target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                Get Directions
            </a>
        </div>
    `;
    
    // Create info window
    const infoWindow = new google.maps.InfoWindow({
        content: contentString
    });
    
    // Add click event to marker
    marker.addListener("click", () => {
        // Close all info windows
        infoWindows.forEach(window => window.close());
        
        // Open this info window
        infoWindow.open({
            anchor: marker,
            map
        });
    });
    
    // Store markers and info windows
    markers.push(marker);
    infoWindows.push(infoWindow);
}

// Event listener for "Show on Map" buttons
document.addEventListener('DOMContentLoaded', function() {
    const mapButtons = document.querySelectorAll('.center-map-btn');
    
    mapButtons.forEach(button => {
        button.addEventListener('click', function() {
            const lat = parseFloat(this.getAttribute('data-lat'));
            const lng = parseFloat(this.getAttribute('data-lng'));
            
            // Find the corresponding marker
            const position = { lat, lng };
            const index = markers.findIndex(marker => 
                marker.getPosition().lat() === lat && 
                marker.getPosition().lng() === lng
            );
            
            if (index !== -1) {
                // Center the map
                map.setCenter(position);
                map.setZoom(16);
                
                // Close all info windows
                infoWindows.forEach(window => window.close());
                
                // Open the info window for this marker
                infoWindows[index].open({
                    anchor: markers[index],
                    map
                });
            }
        });
    });
});
</script>

<!-- Load Google Maps API with your API key -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>