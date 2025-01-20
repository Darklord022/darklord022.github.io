<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
    <link rel="stylesheet" href="CartStyle.css">
    <title>Shopping Cart</title>
</head>
<body>
    <div class="sidebar" id="sidebar" style="position: fixed; top: 0; right: 0; height: 50%; width: 20px; background-color: #333; color: black; overflow-x: hidden; transition: 0.5s; padding-top: 60px;">
        <button class="toggle-btn" id="toggleBtn" style="position: absolute; top: 20px; right: -25px; background-color: #333; color: black; border: none; cursor: pointer; padding: 10px;">&lt;</button>
        <div class="sidebar-content" style="padding: 15px; display: none;"></div>
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
    <header>
        <div class="container">
            <h1>MEDUSA</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Wish</a></li>
                    <li><a href="Cart.html">Cart</a></li>
                    <li><a href="#">Account</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="cart">
            <h2>Your Shopping Cart</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Discard</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    
                </tbody>
            </table>
        <script>
            function loadCart() {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const cartItemsContainer = document.getElementById('cart-items');
                let totalAmount = 0;

                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = '<p style="text-align: center;">Your cart is empty!</p>';
                } else {
                    cartItemsContainer.innerHTML = cart.map(
                        ({ item, price, quantity }, index) => {
                            totalAmount += price * quantity;
                            return `
                                <tr>
                                    <td>${item}</td>
                                    <td>$${price}</td>
                                    <td>${quantity}</td>
                                    <td>$${price * quantity}</td>
                                    <td><button onclick="removeFromCart(${index})">Remove</button></td>
                                </tr>
                            `;
                        }
                    ).join('');
                    cartItemsContainer.innerHTML += `
                        <tfoot>
                            <tr>
                                <td colspan="3">Total</td>
                                <td>$${totalAmount}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    `;
                }
            }
        </script>
        <script>
                function removeFromCart(index) {
                  const cart = JSON.parse(localStorage.getItem('cart')) || [];
                  cart.splice(index, 1); // Remove the selected item
                  localStorage.setItem('cart', JSON.stringify(cart));
                  loadCart(); // Refresh the cart display
                }
            
                loadCart();
                </script>
    
</body>
</html>