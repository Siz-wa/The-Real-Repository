
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
                <div class="pt-5">

                <div class="panel mb-5 lg:col-span-2">
                            <div class="mb-5 flex items-center justify-between">
                                <h5 class="text-lg font-semibold dark:text-white-light">Profile</h5>
                            </div>
                            <div class="mb-5">
                                <div class="flex flex-col items-center justify-center">
                                  
                                <img src="<?= !empty($pfPicture) ? $pfPicture : '../public/assetsD/images/user-profile.jpeg' ?>" alt="image" class="mb-5 h-24 w-24 rounded-full object-cover">

                               
                                    <p class="text-xl font-semibold text-primary"><?= htmlspecialchars($fname.' '.$lname)?></p>
                                </div>
                                <ul class="m-auto mt-5 flex max-w-[160px] flex-col space-y-4 font-semibold text-white-dark">
                                    <li class="flex items-center gap-2">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                                            <path d="M2.3153 12.6978C2.26536 12.2706 2.2404 12.057 2.2509 11.8809C2.30599 10.9577 2.98677 10.1928 3.89725 10.0309C4.07094 10 4.286 10 4.71612 10H15.2838C15.7139 10 15.929 10 16.1027 10.0309C17.0132 10.1928 17.694 10.9577 17.749 11.8809C17.7595 12.057 17.7346 12.2706 17.6846 12.6978L17.284 16.1258C17.1031 17.6729 16.2764 19.0714 15.0081 19.9757C14.0736 20.6419 12.9546 21 11.8069 21H8.19303C7.04537 21 5.9263 20.6419 4.99182 19.9757C3.72352 19.0714 2.89681 17.6729 2.71598 16.1258L2.3153 12.6978Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M17 17H19C20.6569 17 22 15.6569 22 14C22 12.3431 20.6569 11 19 11H17.5" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M10.0002 2C9.44787 2.55228 9.44787 3.44772 10.0002 4C10.5524 4.55228 10.5524 5.44772 10.0002 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.99994 7.5L5.11605 7.38388C5.62322 6.87671 5.68028 6.0738 5.24994 5.5C4.81959 4.9262 4.87665 4.12329 5.38382 3.61612L5.49994 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M14.4999 7.5L14.6161 7.38388C15.1232 6.87671 15.1803 6.0738 14.7499 5.5C14.3196 4.9262 14.3767 4.12329 14.8838 3.61612L14.9999 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <?php if ($isVerified === 1): ?>
                                            <?php echo htmlspecialchars('Verified'); ?>
                                        <?php else: ?>
                                            <?php echo "Unverified"; ?>
                                        <?php endif; ?>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                                            <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M7 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M17 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M2 9H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                        <?php if (isset($Bday)): ?>
                                            <?= htmlspecialchars($Bday)?>
                                        <?php else: ?>
                                            <?php echo "No Data Yet"; ?>
                                        <?php endif; ?> 
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                                            <path opacity="0.5" d="M4 10.1433C4 5.64588 7.58172 2 12 2C16.4183 2 20 5.64588 20 10.1433C20 14.6055 17.4467 19.8124 13.4629 21.6744C12.5343 22.1085 11.4657 22.1085 10.5371 21.6744C6.55332 19.8124 4 14.6055 4 10.1433Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                                        </svg>
                
                                        <?php if (!empty($_SESSION['user']['province']) && !empty($_SESSION['user']['city'])): ?>
                                            <?= htmlspecialchars($city.', '.$province)?>
                                        <?php else: ?>
                                            <?php echo "No Data Yet"; ?>
                                        <?php endif; ?>    
                                    </li>
                                    <li>    
                                        <a href="javascript:;" class="flex items-center gap-2">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                                                <path opacity="0.5" d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                            <span class="truncate text-primary"><?= htmlspecialchars($email)?></span></a>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                            <path d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5894L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651M4.00289 5.74561C3.96765 5.12559 4.25823 4.56668 4.69185 4.13552L6.26145 2.57483C7.13596 1.70529 8.61028 1.83992 9.37326 2.85908L10.6342 4.54348C11.2507 5.36691 11.1841 6.49484 10.4775 7.19738L10.1907 7.48257" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M18.6763 18.9651C17.0469 19.117 13.0622 18.9492 8.8154 14.7266C4.81076 10.7447 4.09308 7.33182 4.00293 5.74561" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M16.1007 13.3589C16.1007 13.3589 15.0181 14.4353 12.0631 11.4971C9.10807 8.55886 10.1907 7.48242 10.1907 7.48242" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                        <span class="whitespace-nowrap" dir="ltr">
                                        <?php if (!empty($phoneNo)): ?>
                                           <?= htmlspecialchars($phoneNo)?>
                                        <?php else: ?>
                                            <?php echo "No Data Yet"; ?>
                                        <?php endif; ?>
                                        </span>
                                    </li>
                                </ul>
                                <ul class="mt-7 flex items-center justify-center gap-2">
                                    <li>
                                        <a class="btn btn-info flex h-10 w-10 items-center justify-center rounded-full p-0" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-danger flex h-10 w-10 items-center justify-center rounded-full p-0" href="javascript:;">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                <path d="M3.33946 16.9997C6.10089 21.7826 12.2168 23.4214 16.9997 20.66C18.9493 19.5344 20.3765 17.8514 21.1962 15.9286C22.3875 13.1341 22.2958 9.83304 20.66 6.99972C19.0242 4.1664 16.2112 2.43642 13.1955 2.07088C11.1204 1.81935 8.94932 2.21386 6.99972 3.33946C2.21679 6.10089 0.578039 12.2168 3.33946 16.9997Z" stroke="currentColor" stroke-width="1.5"></path>
                                                <path opacity="0.5" d="M16.9497 20.5732C16.9497 20.5732 16.0107 13.9821 14.0004 10.5001C11.99 7.01803 7.05018 3.42681 7.05018 3.42681M7.57711 20.8175C9.05874 16.3477 16.4525 11.3931 21.8635 12.5801M16.4139 3.20898C14.926 7.63004 7.67424 12.5123 2.28857 11.4516" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-dark flex h-10 w-10 items-center justify-center rounded-full p-0" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                
                            </div>
                            
                            <div class="panel mb-5">
                            <div class="mt-10 flex items-center justify-between">
                                <h5 class="text-lg font-semibold dark:text-white-light"><?= htmlspecialchars($subsData['planName'])?></h5>
                                <a href="javascript:;" class="btn btn-primary">Renew Now</a>
                            </div>
                            <div class="group mt-10">
                            <ul class="mb-7 list-outside list-disc space-y-2 font-semibold text-white-dark text-left pl-5">
                            <li class="mt-10"><?= htmlspecialchars($subsData['description'])?></li>
                                    <?php if($subsData['type'] === 'Yearly'):?>
                                        <li class="mt-10">1 year of weekly deliveries</li>
                                    <?php elseif($subsData['type'] === 'Quarterly'):?>
                                        <li class="mt-10">3 months of weekly deliveries</li> 
                                    <?php else:?>
                                        <li class="mt-10">1 month of weekly deliveries</li> 
                                    <?php endif;?>    

                                </ul>
                                <div class="mt-10 flex items-center justify-between font-semibold ">
                                    <p class="flex items-center rounded-full bg-dark px-2 py-1 text-xs font-semibold text-white-light">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ltr:mr-1 rtl:ml-1">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path d="M12 8V12L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        Date of Expiry: <?=htmlspecialchars(date("D, d M Y"),strtotime($subsData['endDate']))?>
                                    </p>
                                    <p class="text-info">$ <?= htmlspecialchars(number_format($subsData['price'],2))?> / 
                                    <?php if($subsData['type'] === 'Yearly'):?>
                                        Year
                                    <?php elseif($subsData['type'] === 'Quarterly'):?>
                                        Quarter 
                                    <?php else:?>
                                        Month
                                    <?php endif;?>
                                    </p>
                                </div>
                                <div class="mb-5 h-2.5 overflow-hidden rounded-full bg-dark-light p-0.5 dark:bg-dark-light/10">
                                    <div class="relative h-full w-full rounded-full bg-gradient-to-r from-[#f67062] to-[#fc5296]" style="width: 100%"></div>
                                </div>
                            </div>

                        </div> 
                        
                        </div>


                    <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
                        
                    <div class="panel lg:col-span-2 ">
                                <div x-data="multipleTable">
                        
                                    <div class="panel mt-6">
                                        <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">Payment History</h5>
                                        <table id="myTable2" class="whitespace-nowrap"></table>
                                    </div>
                                
                                </div>
                                </div>                   
                        <div class="panel lg:col-span-2">
                            <div class="mb-5">
                            <div x-data="multipleTable">
                        
                                <div class="panel mt-6">
                                    <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">Orders</h5>
                                    <table id="myTable1" class="whitespace-nowrap"></table>
                                </div>
                            
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- NAKATAGONG SUMMARY -->

                        
                        
                        <!-- end main content section -->

                </div>

                 
                    </div>
                
            </div>

   

        <!-- start footer tion -->
        <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
            © <span id="footer-year">2022</span>. Jassa Rich All rights reserved.
        </div>
        <!-- end footer section -->
    </div>
</div>



<script>
    const paymentData = <?= json_encode($paymentData)?>;
    const orderData = <?= json_encode($orderData)?>;

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

        Alpine.data('multipleTable', () => ({
              datatable1: null,
              datatable2: null,
              init() {
                this.datatable1 = new simpleDatatables.DataTable('#myTable2', {
                      data: {
                          headings: ['ID','Payment Date', 'Amount'],
                          data: paymentData.map(payment => [
                            payment.paymentID,
                            payment.created_at,
                            payment.Amount
                          ]),
                      },
                      searchable: true,
                      perPage: 10,
                      perPageSelect: [10, 20, 30, 50, 100],
                      columns: [
                          {
                              select: 0,
                              render: (data, cell, row) => {
                                  return `<a href="?action=paymentdetails&paymentID=${data}"><div class="flex items-center w-max">${data}</div></a>`;
                              },
                              sort: 'asc',
                          },
                        //   {
                        //       select: 12,
                        //       sortable: false,
                        //       render: (data, cell, row) => {
                        //           return `<div class="w-4/5 min-w-[100px] h-2.5 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex"> <div class="bg-${this.randomColor()} h-2.5 rounded-full rounded-bl-full text-center text-white text-xs" style="width:${parseInt(data)}%"></div> </div>`;
                        //       },
                        //   },
                        //      {
                        //       select: 1,
                        //       render: (data, cell, row) => {
                        //           return this.formatDate(data);
                        //       },
                        //   },
                        //   {
                        //       select: 6,
                        //       sortable: false,
                        //       render: (data, cell, row) => {
                        //           return `<div class="flex items-center">
                        //               <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Edit">
                        //                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                        //                       <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                        //                       <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                        //                   </svg>
                        //               </button>
                        //               <button type="button" x-tooltip="Delete">
                        //                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                        //                       <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                   </svg>
                        //               </button>
                        //           </div>`;
                        //       },
                        //   },
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
                

                  this.datatable2 = new simpleDatatables.DataTable('#myTable1', {
                      data: {
                          headings: ['ID','DeliveryDate', 'Status'],
                          data: orderData.map(order => [
                            order.orderID,
                            order.requiredDate,
                            order.status
                          ]),
                      },
                      searchable: true,
                      perPage: 10,
                      perPageSelect: [10, 20, 30, 50, 100],
                      columns: [
                          {
                              select: 0,
                              render: (data, cell, row) => {
                                  return `<a href="?action=orderdetails&orderID=${data}"><div class="flex items-center w-max">${data}</div></a>`;
                              },
                              sort: 'asc',
                          },
                        //   {
                        //       select: 12,
                        //       sortable: false,
                        //       render: (data, cell, row) => {
                        //           return `<div class="w-4/5 min-w-[100px] h-2.5 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex"> <div class="bg-${this.randomColor()} h-2.5 rounded-full rounded-bl-full text-center text-white text-xs" style="width:${parseInt(data)}%"></div> </div>`;
                        //       },
                        //   },
                        //      {
                        //       select: 1,
                        //       render: (data, cell, row) => {
                        //           return this.formatDate(data);
                        //       },
                        //   },
                        //   {
                        //       select: 6,
                        //       sortable: false,
                        //       render: (data, cell, row) => {
                        //           return `<div class="flex items-center">
                        //               <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Edit">
                        //                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                        //                       <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                        //                       <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                        //                   </svg>
                        //               </button>
                        //               <button type="button" x-tooltip="Delete">
                        //                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                        //                       <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                       <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        //                   </svg>
                        //               </button>
                        //           </div>`;
                        //       },
                        //   },
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
    });
</script>
</body>
</html>
