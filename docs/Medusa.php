<?php
// Connect to the SQLite3 database
$db = new SQLite3('db/ComputerParts.db');

// Query the Products table
$query = 'SELECT * FROM Products';
$result = $db->query($query);
?>
<!DOCTYPE html>
<html lang="en"> 
<head> 
  <meta name="viewport" content="width=1024">
  <link rel="stylesheet" href="HomeStyle.css">
  <title>Medusa</title>
</head>

<body style="background-color: black; color: green;">
  
  <div class="header" style="display: flex; align-items: center; justify-content: space-between; padding: 1px;">
  <img src="Logo.jfif" alt="Logo" style="width: 70px; height: 70px;">
  <div class="Options" style="display: flex; align-items: center; gap: 20px;">
    <a href="#">Location & contact</a>
    <a href="#">About us</a>
    <a href="Cart.php">Cart</a>
    <img src="https://images.pond5.com/neon-glowing-green-color-gear-footage-273729388_iconl.jpeg" 
         alt="Settings" 
         style="width: 94px; height: 54px; cursor: pointer;" 
         class="settings-icon">
         <div class="dropdown-content" style="display: none; position: absolute; background-color: black; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1;right: 0;">
          <a href="Profile.html" style="color: green; text-decoration: none; display: block; padding: 12px 16px;">Profile</a>
          <a href="#" style="color: green; text-decoration: none; display: block; padding: 12px 16px;">Settings</a>
          <a href="index.html" style="color: green; text-decoration: none; display: block; padding: 12px 16px;">Logout</a>
          </div>
  </div>
</div>

    <script> // Setting Dropdown
      document.querySelector('.settings-icon').addEventListener('click', function() {
      const dropdownContent = this.nextElementSibling;
      dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
      });

      window.onclick = function(event) {
      if (!event.target.matches('.settings-icon')) {
        const dropdowns = document.getElementsByClassName('dropdown-content');
        for (let i = 0; i < dropdowns.length; i++) {
        const openDropdown = dropdowns[i];
        if (openDropdown.style.display === 'block') {
          openDropdown.style.display = 'none';
        }
        }
      }
      };
    </script>

    <div style="flex: 2; text-align: center;">
      <img src="https://t3.ftcdn.net/jpg/10/37/04/98/360_F_1037049820_SscRKcSwrEbmNTFqo2MlBVKsHox7mFmn.jpg" alt="Search Icon" style="width: 55px; height: 36px; vertical-align: middle; margin-right: 1px;">
      <input type="text" id="searchInput" placeholder="Search..." style="width: 50%; padding: 6px; background-color: green; color: black;" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'" oninput="filterItems()">
      
  <div class="filter-bar">
    <select id="category-filter">
      <option value="">All Categories</option>
      <option value="cpu">CPU</option>
      <option value="gpu">GPU</option>
      <option value="motherboard">Motherboard</option>
      <option value="ram">RAM</option>
      <option value="power-supply">Power Supply</option>
      <option value="mouse">Mouse</option>
      <option value="keyboard">Keyboard</option>
    </select>
    <select id="price-filter">
      <option value="">All Prices</option>
      <option value="low">Under $100</option>
      <option value="medium">$100 - $500</option>
      <option value="high">Over $500</option>
    </select>
    <button id="apply-filters">Apply Filters</button>
  </div>
  <script>
  function filterItems() {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase();
    const category = document.getElementById('category-filter').value;
    const price = document.getElementById('price-filter').value;

    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
      const name = card.querySelector('h3').textContent.toLowerCase();
      const productCategory = card.querySelector('h2:nth-child(3)').textContent.split(': ')[1].toLowerCase();
      const productPrice = parseFloat(card.querySelector('h2:nth-child(4)').textContent.split('$')[1]);

      let isVisible = true;

      if (searchQuery && !name.includes(searchQuery)) {
        isVisible = false;
      }

      if (category && productCategory !== category) {
        isVisible = false;
      }

      if (price) {
        if (price === 'low' && productPrice >= 100) {
          isVisible = false;
        } else if (price === 'medium' && (productPrice < 100 || productPrice > 500)) {
          isVisible = false;
        } else if (price === 'high' && productPrice <= 500) {
          isVisible = false;
        }
      }

      card.style.display = isVisible ? 'block' : 'none';
    });
  }

  document.getElementById('apply-filters').addEventListener('click', filterItems);
</script>
</div>
     


  <div class="sidebar" id="sidebar" style="position: fixed; top: 0; right: 0; height: 50%; width: 20px; background-color: #333; color: black; overflow-x: hidden; transition: 0.5s; padding-top: 60px;">
    <button class="toggle-btn" id="toggleBtn" style="position: absolute; top: 20px; right: -25px; background-color: #333; color: black; border: none; cursor: pointer; padding: 10px;">&lt;</button>
    <div class="sidebar-content" style="padding: 15px; display: none;"></div>
      
    
     
      <div class="game-container"> 
        <iframe src="https://scratch.mit.edu/projects/1114816637/embed" allowtransparency="true" style="width: 550px; height: 430px; border: none; background-color: black;"></iframe> 
       </div>
    </div>
  

  
  <script> // Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebarContent = document.querySelector('.sidebar-content');

    toggleBtn.addEventListener('click', () => {
      if (sidebarContent.style.display === 'none') {
      sidebar.style.width = '550px';
      sidebarContent.style.display = 'block';
      toggleBtn.textContent = '-->';
      toggleBtn.style.backgroundColor = '#333';
      } else {
      sidebar.style.width = '20px';
      sidebarContent.style.display = 'none';
      toggleBtn.textContent = '<--';
      toggleBtn.style.backgroundColor = '#333';
      }
    });

    // Position the bar in the middle right
    sidebar.style.top = '50%';
    sidebar.style.transform = 'translateY(-50%)';
    // Set green background color for the sidebar
    sidebar.style.backgroundColor = 'green';
  
    sidebar.style.border = '2px solid green';
    </script>
  </script>
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const numberOfGears = 5;
      const gears = [];
      for (let i = 0; i < numberOfGears; i++) {
        const gear = document.createElement('div');
        gear.classList.add('gear');
        gear.style.setProperty('--random-x', Math.random());
        gear.style.animationDelay = `${Math.random() * 5}s`;
        document.body.appendChild(gear);
        gears.push(gear);
      }

      const toggleGearsBtn = document.createElement('button');
      toggleGearsBtn.textContent = 'Toggle Gears';
      toggleGearsBtn.style.position = 'fixed';
      toggleGearsBtn.style.bottom = '10px';
      toggleGearsBtn.style.right = '10px';
      document.body.appendChild(toggleGearsBtn);
// remember the state of the gears visibility 
      let gearsVisible = JSON.parse(localStorage.getItem('gearsVisible')) ?? true;
      gears.forEach(gear => {
        gear.style.display = gearsVisible ? 'block' : 'none';
      });

      toggleGearsBtn.addEventListener('click', () => {
        gearsVisible = !gearsVisible;
        gears.forEach(gear => {
          gear.style.display = gearsVisible ? 'block' : 'none';
        });
        localStorage.setItem('gearsVisible', JSON.stringify(gearsVisible));
      });
    });
  </script>
<!-- Items  -->
<div class="product-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
  <?php if ($result): ?>
  <!-- Loop through products and display them in containers -->
  <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
    <div class="product-card" style="border: 2px solid green; padding: 20px; background-color: black; color: green; width: calc(33.33% - 20px); box-sizing: border-box; text-align: center;">
      <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['Name']; ?>" class="product-image" style="max-width: 100%; height: auto;">
      <h3><?php echo $row['Name']; ?></h3>
      <h2><strong>Category:</strong> <?php echo $row['Category']; ?></h2>
      <h2><strong>Price:</strong> $<?php echo $row['Price']; ?></h2>
      <h2><strong>Stock:</strong> <?php echo $row['Stock']; ?></h2>
      <h2><button onclick="addToCart('<?php echo $row['Name']; ?>', <?php echo $row['Price']; ?>);" style="background-color: green; color: whitesmoke;">Add to Cart</button></h2>
    </div>
  <?php endwhile; ?>
  <?php else: ?>
  <p>Error: Could not retrieve product list.</p>
  <?php endif; ?>
</div>
<!--Cart Functionality-->
  <script>
    function addToCart(item, price) {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.push({ item, price , quantity: 1 });
      localStorage.setItem('cart', JSON.stringify(cart));
      alert(`${item} added to cart!`);
    }
  </script>
 
  
  <div class="footer" style="display: flex; justify-content: center; align-items: center; background-color: black; color: green; padding: 10px;">
    <p>&copy; 2025 Medusa. All rights reserved.</p>
</body>
</html>
