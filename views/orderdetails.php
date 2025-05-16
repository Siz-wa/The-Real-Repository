

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
        <!-- sidebar menu overlay -->
        
        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
           

            <div class="main-content flex flex-col min-h-screen">
               
                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                     
                    <div x-data="invoicePreview">

                   <?php if(empty($orderDetails['POD'] )): ?>
                      <div class="mb-5 grid gap-6 xl:grid-cols-3">
                       

                            <div class="panel mb-6 lg:col-span-1 custom-file-container">
                                <div class="panel mb-6 lg:col-span-1 custom-file-container">
                                <form method="POST" enctype="multipart/form-data">
                                    <label class="input-container" style="margin-bottom: 300px;">
                                        Select image:
                                        <input
                                            class="mb-5 input-hidden"
                                            type="file"
                                            name="image"
                                            id="customImageInput"
                                            accept="image/*"
                                        />
                                        <span class="browse-button">Browse</span>
                                        <span class="input-visible">Proof of Delivery</span>

                                        <!-- Image preview container -->
                                        <div id="customImagePreview" class="mt-5"></div>
                                    </label>
                                      <div class="mb-5">
                                                                            <button type="submit" class="btn btn-primary" name="submit">Confirm Order</button>

                                    </div>
                                  
                                </form>
                            </div>
                        </div>
                   <?php endif;?>     
                                
<!-- script -->
                   
                        <div class="panel  h-full xl:col-span-2">
                            <div class="flex flex-wrap justify-between gap-4 px-4">
                                <div class="text-2xl font-semibold uppercase">Order Details</div>
                                <div class="shrink-0">
                                    <img src="assets/img/thc logo.png" alt="image" class="w-14 ltr:ml-auto rtl:mr-auto rounded-full">
                                </div>
                            </div>
                            <div class="px-4 ltr:text-right rtl:text-left">
                                <div class="mt-6 space-y-1 text-white-dark">
                                    <div>Carsadang Bago 1, Imus, Philippines</div>
                                    <div>twoheartsconfections@gmail.com</div>
                                    <div>+099915006728</div>
                                </div>
                            </div>
                        
                            <hr class="my-6 border-[#e0e6ed] dark:border-[#1b2e4b]">
                            <div class="flex flex-col flex-wrap justify-between gap-6 lg:flex-row">
                                <div class="flex-1">
                                <img src="data:image/jpeg;base64,<?=$orderDetails['POD']?>" alt="" class="w-1/2 h-1/2 rounded-lg">

                                    <div class="space-y-1 text-white-dark">
                                        <div>Issue For:</div>
                                        <div class="font-semibold text-black dark:text-white"><?= htmlspecialchars($orderDetails['fname'].' '.$orderDetails['lname'])?></div>
                                        <div><?= htmlspecialchars($orderDetails['ZipCode'].', '.'Blk '.$orderDetails['blk'].' Lot '.$orderDetails['lot'].', '.$orderDetails['brgy'].', '.$orderDetails['city'].', '.$orderDetails['province'])?></div>
                                        <div><?= htmlspecialchars($orderDetails['email'])?></div>
                                        <div>+ <?=htmlspecialchars($orderDetails['phoneNo'])?></div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between gap-6 sm:flex-row lg:w-2/3">
                                    <div class="xl:1/3 sm:w-1/2 lg:w-2/5">
                                        <div class="mb-5 flex w-full items-center justify-between">
                                            <div class="text-white-dark">Product: </div>
                                            <div><?= htmlspecialchars($orderDetails['productName'])?></div>
                                        </div>
                                        <div class="mb-5 flex w-full items-center justify-between">
                                            <div class="text-white-dark">Date Ordered: </div>
                                            <div><?= htmlspecialchars(date("D, d M Y",strtotime($orderDetails['created_at'])))?></div>
                                        </div>
                                        <div class="mb-5 flex w-full items-center justify-between">
                                            <div class="text-white-dark">Delivery Date: </div>
                                            <div><?= htmlspecialchars(date("D, d M Y",strtotime($orderDetails['requiredDate'])))?></div>
                                        </div>
                                        <div class="flex w-full items-center justify-between">
                                            <div class="text-white-dark">Order ID: </div>
                                            <div># <?= htmlspecialchars($orderDetails['orderID'])?></div>
                                        </div>
                                    </div>
                                    <div class="xl:1/3 sm:w-1/2 lg:w-2/5">
                                        <div class="mb-5 flex w-full items-center justify-between">
                                            <div class="text-white-dark">Quantity: </div>
                                            <div class="whitespace-nowrap"><?= htmlspecialchars($orderDetails['qty_per_package'])?></div>
                                        </div>
                                        <div class="mb-5 flex w-full items-center justify-between">
                                            <div class="text-white-dark">Order Status: </div>
                                            <div><?= htmlspecialchars($orderDetails['status'])?></div>
                                        </div>
                                        <!-- <div class="mb-2 flex w-full items-center justify-between">
                                            <div class="text-white-dark">SWIFT Code:</div>
                                            <div>S58K796</div>
                                        </div>
                                        <div class="mb-2 flex w-full items-center justify-between">
                                            <div class="text-white-dark">IBAN:</div>
                                            <div>L5698445485</div>
                                        </div>
                                        <div class="mb-2 flex w-full items-center justify-between">
                                            <div class="text-white-dark">Country:</div>
                                            <div>United States</div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-6">
                                <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <template x-for="item in columns" :key="item.key">
                                                <th :class="[item.class]" x-text="item.label"></th>
                                            </template>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in items" :key="item.id">
                                            <tr>
                                                <td x-text="item.id"></td>
                                                <td x-text="item.title"></td>
                                                <td x-text="item.quantity"></td>
                                                <td class="ltr:text-right rtl:text-left" x-text="`$${item.price}`"></td>
                                                <td class="ltr:text-right rtl:text-left" x-text="`$${item.amount}`"></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="mt-6 grid grid-cols-1 px-4 sm:grid-cols-2">
                                <div></div>
                                <div class="space-y-2 ltr:text-right rtl:text-left">
                                    <div class="flex items-center">
                                        <div class="flex-1">Subtotal</div>
                                        <div class="w-[37%]">$3255</div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-1">Tax</div>
                                        <div class="w-[37%]">$700</div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-1">Shipping Rate</div>
                                        <div class="w-[37%]">$0</div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-1">Discount</div>
                                        <div class="w-[37%]">$10</div>
                                    </div>
                                    <div class="flex items-center text-lg font-semibold">
                                        <div class="flex-1">Grand Total</div>
                                        <div class="w-[37%]">$3945</div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                          </div>   
                    </div>
                    <!-- end main content section -->

                </div>

                <!-- start footer section -->
                <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. Jassa Rich All rights reserved.
                </div>
                <!-- end footer section -->
            </div>
        </div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById('customImageInput');
    const previewContainer = document.getElementById('customImagePreview');

    input.addEventListener('change', function () {
        const file = this.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" alt="Preview" class="w-full max-w-xs rounded border border-gray-300 shadow" />
                `;
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = '<p class="text-red-500">Selected file is not an image.</p>';
        }
    });
});
</script>


        <script>

            
            document.addEventListener('alpine:init', () => {
                
                   // single image upload
               
    
       
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

         
                // Set the name attribute after DOM content is ready
                

                   
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

                //invoice preview
                // Alpine.data('invoicePreview', () => ({
                //     items: [
                //         {
                //             id: 1,
                //             title: 'Calendar App Customization',
                //             quantity: 1,
                //             price: '120',
                //             amount: '120',
                //         },
                //         {
                //             id: 2,
                //             title: 'Chat App Customization',
                //             quantity: 1,
                //             price: '230',
                //             amount: '230',
                //         },
                //         {
                //             id: 3,
                //             title: 'Laravel Integration',
                //             quantity: 1,
                //             price: '405',
                //             amount: '405',
                //         },
                //         {
                //             id: 4,
                //             title: 'Backend UI Design',
                //             quantity: 1,
                //             price: '2500',
                //             amount: '2500',
                //         },
                //     ],
                //     columns: [
                //         {
                //             key: 'orderID',
                //             label: 'Order ID',
                //         },
                //         {
                //             key: 'productName',
                //             label: 'PRODUCT',
                //         },
                //         {
                //             key: 'qty',
                //             label: 'QTY',
                //         },
                //     ],

                //     print() {
                //         window.print();
                //     },
                // }));
            });
        </script>
    </body>
</html>
