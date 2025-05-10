
    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    
            <div class="main-content flex flex-col min-h-screen">
              

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div>
                        <ul class="flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Users</a>
                            </li>
                            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                                <span>Profile</span>
                            </li>
                        </ul>
         
                        <div class="panel mb ">
                                <div x-data="multipleTable">
                        
                                    <div class="panel mt-6">
                                        <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">Schedule Orders</h5>
                                        <table id="myTable2" class="whitespace-nowrap"></table>
                                    </div>
                                
                                </div>
                                </div>  
                            

</div>
</div>

</div>
<div id="modalOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:998;"></div>
                     
    <div id="modal" style="display:none; position:fixed; top:10%; left:50%; transform:translateX(-50%); background: #0e1726; width:80%; max-height:80%; overflow-y:auto; padding:20px; border-radius:10px; box-shadow: 0 0 15px rgba(0,0,0,0.3); z-index:999;">
    <form id="scheduleForm" method="POST">
        <!-- Hidden inputs -->
        <input type="hidden" name="week_start" id="modal_week_start">
        <input type="hidden" name="week_end" id="modal_week_end">

        <h4 class="mb-3">Schedule Your Order</h4>

        <!-- Order date input -->
        <div class="mb-3">
            <label for="modal_order_date" class="form-label">Choose delivery date:</label>
            <input type="date" class="form-control" name="orderDate" id="modal_order_date" required>
        </div>

        <!-- Product selection grid -->
        <div class="mb-3">
            <label class="form-label">Choose a product:</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
              <?php foreach($products as $product):?>
                <div class=" border border-dark shadow rounded p-4 h-60 flex flex-col justify-between">
                    <label class="card h-100 p-2 border border-dark shadow-sm" style="cursor:pointer;">
                        <input data-availability="<?= $product['availability']?>"  type="radio" name="productID" value="<?= $product['productID'] ?>">
                        <img src="data:image/jpeg;base64,<?= $product['image'] ?>" alt="Product Image" class="card-img-top" style="height:150px; object-fit:cover; border-radius:5px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['productName']) ?></h5>
                        </div>
                    </label>
                    <p class=" text-muted" style="font-size: 0.9em;"><?= htmlspecialchars($product['description']) ?></p>
                    <p class="mt-5"><?=htmlspecialchars($product['qty_per_package'])?> pc/s</p>
                    <p class="<?=($product['availability']===1)?'text-success':'text-danger'?> mt-5"><?=($product['availability']===1)?'Available':'Unavailable'?></p>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <!-- Confirm/cancel buttons -->
        <div class="flex justify-end gap-2 mt-3">
            <button type="submit" name="orderProd" class="btn btn-primary">Confirm Order</button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </div>
    </form>
    </div> 
</div>
<style>
.swal-title-center {
  text-align: center;
}

.swal-text-center {
  text-align: center;
}

.swal-wide {
  width: 50em; /* Optional: Adjust width as needed */
}
</style>


</style>
<script src="js/sweetalert2.all.min.js"></script>
<script>


document.querySelectorAll('input[name="productID"]').forEach(function(input) {
    input.addEventListener('change', function() {
        const availability = this.getAttribute('data-availability');

        if (availability === "0") {
            Swal.fire({
                icon: 'warning',
                title: 'Currently Unavailable',
                text: 'This product’s taking a little break, but we hope to have it back soon!',
                customClass: {
                popup: 'swal-wide',
                title: 'swal-title-center',
                htmlContainer: 'swal-text-center'
            }
            });

            // Optionally uncheck the radio button
            this.checked = false;
        }
    });
});



document.getElementById("scheduleForm").addEventListener("submit", function(e) {
  e.preventDefault(); // Prevent default form submission

  const form = this;
  const formData = new FormData(form);

  Swal.fire({
  title: 'Are you sure?',
  text: 'This order is final and cannot be modified or cancelled',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#E7515A',
  confirmButtonText: 'Yes, schedule it this week!',
  customClass: {
    popup: 'swal-wide',
    title: 'swal-title-center',
    htmlContainer: 'swal-text-center'
  }
}).then((result) => {
    if (result.isConfirmed) {
      fetch(form.action, {
        method: "POST",
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.error) {
          Swal.fire({
            title: 'Oops!',
            text: data.error,
            icon: 'error',
            confirmButtonColor: '#3085d6',
            customClass: {
            popup: 'swal-wide',
            title: 'swal-title-center',
            htmlContainer: 'swal-text-center'
        }
          })
        } else {
          Swal.fire({
            title: 'Thank you! 🎉',
            text: 'You have successfully subscribed!',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            customClass: {
            popup: 'swal-wide',
            title: 'swal-title-center',
            htmlContainer: 'swal-text-center'
        }
          }).then(() => {
            window.location.href = 'index.php?action=home';
          });
        }
      })
      .catch(err => {
        Swal.fire({
          title: 'Error',
          text: 'Something went wrong while processing your request.',
          icon: 'error',
          confirmButtonColor: '#3085d6',
          customClass: {
            popup: 'swal-wide',
            title: 'swal-title-center',
            htmlContainer: 'swal-text-center'
        }
        })
      });
    }
  });
});
</script>
                            

                           
<script>
// Show modal and populate with dates
function openModal(weekStart, weekEnd) {
    document.getElementById('modalOverlay').style.display = 'block';
    document.getElementById('modal').style.display = 'block';
    document.getElementById('modal_week_start').value = weekStart;
    document.getElementById('modal_week_end').value = weekEnd;
    document.getElementById('modal_order_date').setAttribute('min', weekStart);
    document.getElementById('modal_order_date').setAttribute('max', weekEnd);
    document.getElementById('modal').style.display = 'block';
}

// Hide modal
function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
    document.getElementById('modal').style.display = 'none';

}

// Highlight selected product card
function selectProduct(card) {
    document.querySelectorAll('.product-card').forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
    card.querySelector('input[type="radio"]').checked = true;
}
</script>




       
        <script>    
            const weeks = <?= json_encode($weeks)?>;
            document.addEventListener('alpine:init', () => {
                // main section
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));

                // theme customization
                Alpine.data('customizer', () => ({
                    showCustomizer: false,
                }));

                // sidebar section
                Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));

                // header section
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },

                    notifications: [
                        {
                            id: 1,
                            profile: 'user-profile.jpeg',
                            message: '<strong class="text-sm mr-1">Jassa Rich</strong>invite you to <strong>Prototyping</strong>',
                            time: '45 min ago',
                        },
                        {
                            id: 2,
                            profile: 'profile-34.jpeg',
                            message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                            time: '9h Ago',
                        },
                        {
                            id: 3,
                            profile: 'profile-16.jpeg',
                            message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                            time: '9h Ago',
                        },
                    ],

                    messages: [
                        {
                            id: 1,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                            title: 'Congratulations!',
                            message: 'Your OS has been updated.',
                            time: '1hr',
                        },
                        {
                            id: 2,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                            title: 'Did you know?',
                            message: 'You can switch between artboards.',
                            time: '2hr',
                        },
                        {
                            id: 3,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                            title: 'Something went wrong!',
                            message: 'Send Reposrt',
                            time: '2days',
                        },
                        {
                            id: 4,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                            title: 'Warning',
                            message: 'Your password strength is low.',
                            time: '5days',
                        },
                    ],

                    languages: [
                        {
                            id: 1,
                            key: 'Khmer',
                            value: 'kh',
                        },
                        {
                            id: 2,
                            key: 'Danish',
                            value: 'da',
                        },
                        {
                            id: 3,
                            key: 'English',
                            value: 'en',
                        },
                        {
                            id: 4,
                            key: 'French',
                            value: 'fr',
                        },
                        {
                            id: 5,
                            key: 'German',
                            value: 'de',
                        },
                        {
                            id: 6,
                            key: 'Greek',
                            value: 'el',
                        },
                        {
                            id: 7,
                            key: 'Hungarian',
                            value: 'hu',
                        },
                        {
                            id: 8,
                            key: 'Italian',
                            value: 'it',
                        },
                        {
                            id: 9,
                            key: 'Japanese',
                            value: 'ja',
                        },
                        {
                            id: 10,
                            key: 'Polish',
                            value: 'pl',
                        },
                        {
                            id: 11,
                            key: 'Portuguese',
                            value: 'pt',
                        },
                        {
                            id: 12,
                            key: 'Russian',
                            value: 'ru',
                        },
                        {
                            id: 13,
                            key: 'Spanish',
                            value: 'es',
                        },
                        {
                            id: 14,
                            key: 'Swedish',
                            value: 'sv',
                        },
                        {
                            id: 15,
                            key: 'Turkish',
                            value: 'tr',
                        },
                        {
                            id: 16,
                            key: 'Arabic',
                            value: 'ae',
                        },
                    ],

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                Alpine.data('multipleTable', () => ({
                    
              datatable1: null,
              datatable2: null,
              init() {
                this.datatable1 = new simpleDatatables.DataTable('#myTable2', {
                      data: {
                          headings: ['From','To', 'Status','Action'],
                          data: weeks.map(week => [
                            week.week_start,
                            week.week_end,
                            week.status,
                            JSON.stringify(week)
                          ]),
                      },
                      searchable: true,
                      perPage: 10,
                      perPageSelect: [10, 20, 30, 50, 100],
                      columns: [
                        {
  select: 3,
  render: (data, cell, row) => {
    let weekData;
    try {
      weekData = JSON.parse(data);
    } catch (e) {
      console.error('Invalid week data', data);
      return '';
    }

    console.log('Status:', weekData.status); // DEBUG

    if (weekData.status.trim() === 'Available') {
      return `
        <button class="btn btn-success" onclick="openModal('${weekData.week_start}', '${weekData.week_end}')">
          Schedule
        </button>
      `;
    } else {
      return `
        <button class="btn btn-secondary" disabled>
          Already Scheduled
        </button>
      `;
    }
  }}
],
                                    firstLast: true,
                      firstText:
                          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                      lastText:
                          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                      prevText:
                          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                      nextText:
                          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                      labels: {
                          perPage: '{select}',
                      },
                      layout: {
                          top: '{search}',
                          bottom: '{info}{select}{pager}',
                      },
                  });  
                

                  
              },

              formatDate(date) {
                  if (date) {
                      const dt = new Date(date);
                      const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() + 1;
                      const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                      return day + '/' + month + '/' + dt.getFullYear();
                  }
                  return '';
              },

              randomColor() {
                  const color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                  const random = Math.floor(Math.random() * color.length);
                  return color[random];
              },

              randomStatus() {
                  const status = ['PAID', 'APPROVED', 'FAILED', 'CANCEL', 'SUCCESS', 'PENDING', 'COMPLETE'];
                  const random = Math.floor(Math.random() * status.length);
                  return status[random];
              },
          }));
            });
        </script>
    </body>
</html>