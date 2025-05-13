<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

            <div class="main-content flex min-h-screen flex-col">
              
                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="sales">
                        <ul class="flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                            </li>
                            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                                <span>Analytics</span>
                            </li>
                        </ul>



                       




                        

                        <div class="pt-5">
                            <div class="mb-6 grid gap-6 xl:grid-cols-3">
                                <div class="panel h-full xl:col-span-2">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h5 class="text-lg font-semibold">Revenue</h5>
                                        
                                    </div>
                                    <p class="text-lg dark:text-white-light/90">Total Revenue <span class="ml-2 text-primary">$ <?php echo number_format( $totalRevenue, 2) ?></span></p>
                                    <div class="relative overflow-hidden">
                                        <div x-ref="revenueChart" class="rounded-lg bg-white dark:bg-black">
                                            <!-- loader -->
                                            <div class="grid min-h-[325px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel h-full">
                                    <div class="mb-5 flex items-center">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Order By Category</h5>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div x-ref="salesByCategory" class="rounded-lg bg-white dark:bg-black">
                                            <!-- loader -->
                                            <div class="grid min-h-[353px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                                <div class="panel h-full sm:col-span-2 xl:col-span-1">
                                    <div class="mb-5 flex items-center">
                                        <h5 class="text-lg font-semibold dark:text-white-light">
                                            Daily Orders<span class="block text-sm font-normal text-white-dark">Go to columns for details.</span>
                                        </h5>
                                        <div class="relative ltr:ml-auto rtl:mr-auto">
                                            <div class="grid h-11 w-11 place-content-center rounded-full bg-[#ffeccb] text-warning dark:bg-warning dark:text-[#ffeccb]">
                                                <svg width="40" height="40" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div x-ref="dailySales" class="rounded-lg bg-white dark:bg-black">
                                            <!-- loader -->
                                            <div class="grid min-h-[175px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel h-full">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h5 class="text-lg font-semibold">Summary</h5>
                                        <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto">
                                            <a href="javascript:;" @click="toggle">
                                                <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                </svg>
                                            </a>
                                            <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                                <li><a href="javascript:;" @click="toggle">Mark as Done</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="space-y-9">
                                        <div class="flex items-center">
                                            <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                                                <div class="grid h-9 w-9 place-content-center rounded-full bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light">
                                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.74157 18.5545C4.94119 20 7.17389 20 11.6393 20H12.3605C16.8259 20 19.0586 20 20.2582 18.5545M3.74157 18.5545C2.54194 17.1091 2.9534 14.9146 3.77633 10.5257C4.36155 7.40452 4.65416 5.84393 5.76506 4.92196M3.74157 18.5545C3.74156 18.5545 3.74157 18.5545 3.74157 18.5545ZM20.2582 18.5545C21.4578 17.1091 21.0464 14.9146 20.2235 10.5257C19.6382 7.40452 19.3456 5.84393 18.2347 4.92196M20.2582 18.5545C20.2582 18.5545 20.2582 18.5545 20.2582 18.5545ZM18.2347 4.92196C17.1238 4 15.5361 4 12.3605 4H11.6393C8.46374 4 6.87596 4 5.76506 4.92196M18.2347 4.92196C18.2347 4.92196 18.2347 4.92196 18.2347 4.92196ZM5.76506 4.92196C5.76506 4.92196 5.76506 4.92196 5.76506 4.92196Z" stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="mb-2 flex font-semibold text-white-dark">
                                                    <h6>Income</h6>
                                                    <p class="ltr:ml-auto rtl:mr-auto">$ <?php echo number_format($totalRevenue,2) ?></p>
                                                </div>
                                                <!-- <div class="h-2 rounded-full bg-dark-light shadow dark:bg-[#1b2e4b]">
                                                    <div class="h-full w-11/12 rounded-full bg-gradient-to-r from-[#7579ff] to-[#b224ef]"></div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                                                <div class="grid h-9 w-9 place-content-center rounded-full bg-success-light text-success dark:bg-success dark:text-success-light">
                                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.72848 16.1369C3.18295 14.5914 2.41018 13.8186 2.12264 12.816C1.83509 11.8134 2.08083 10.7485 2.57231 8.61875L2.85574 7.39057C3.26922 5.59881 3.47597 4.70292 4.08944 4.08944C4.70292 3.47597 5.59881 3.26922 7.39057 2.85574L8.61875 2.57231C10.7485 2.08083 11.8134 1.83509 12.816 2.12264C13.8186 2.41018 14.5914 3.18295 16.1369 4.72848L17.9665 6.55812C20.6555 9.24711 22 10.5916 22 12.2623C22 13.933 20.6555 15.2775 17.9665 17.9665C15.2775 20.6555 13.933 22 12.2623 22C10.5916 22 9.24711 20.6555 6.55812 17.9665L4.72848 16.1369Z" stroke="currentColor" stroke-width="1.5"></path>
                                                        <circle opacity="0.5" cx="8.60699" cy="8.87891" r="2" transform="rotate(-45 8.60699 8.87891)" stroke="currentColor" stroke-width="1.5"></circle>
                                                        <path opacity="0.5" d="M11.5417 18.5L18.5208 11.5208" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="mb-2 flex font-semibold text-white-dark">
                                                    <h6>Profit</h6>
                                                    <p class="ltr:ml-auto rtl:mr-auto">$ <?php echo number_format($profit,2)?> </p>
                                                </div>
                                                <!-- <div class="h-2 w-full rounded-full bg-dark-light shadow dark:bg-[#1b2e4b]">
                                                    <div class="h-full w-full rounded-full bg-gradient-to-r from-[#3cba92] to-[#0ba360]" style="width: 65%"></div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                                                <div class="grid h-9 w-9 place-content-center rounded-full bg-warning-light text-warning dark:bg-warning dark:text-warning-light">
                                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M10 16H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M14 16H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M2 10L22 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="mb-2 flex font-semibold text-white-dark">
                                                    <h6>Expenses</h6>
                                                    <p class="ltr:ml-auto rtl:mr-auto">$ <?php echo number_format($totalExpenses,2) ?></p>
                                                </div>
                                                <!-- <div class="h-2 w-full rounded-full bg-dark-light shadow dark:bg-[#1b2e4b]">
                                                    <div class="h-full w-full rounded-full bg-gradient-to-r from-[#f09819] to-[#ff5858]" style="width: 80%"></div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel h-full p-0">
                                    <div class="absolute flex w-full items-center justify-between p-5">
                                        <div class="relative">
                                            <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-success-light text-success dark:bg-success dark:text-success-light">
                                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path opacity="0.5" d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path opacity="0.5" d="M11 9H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M5 6H16.4504C18.5054 6 19.5328 6 19.9775 6.67426C20.4221 7.34853 20.0173 8.29294 19.2078 10.1818L18.7792 11.1818C18.4013 12.0636 18.2123 12.5045 17.8366 12.7523C17.4609 13 16.9812 13 16.0218 13H5" stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <h5 class="text-2xl font-semibold ltr:text-right rtl:text-left dark:text-white-light">
                                            <?php echo $totalOrder?>
                                            <span class="block text-sm font-normal">Total Orders</span>
                                        </h5>
                                    </div>
                                    <div x-ref="totalOrders" class="overflow-hidden rounded-lg bg-transparent">
                                        <!-- loader -->
                                        <div class="grid min-h-[290px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                            <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          
<!-- NAKATAGO NA RECENT ACTIVITIES SECTION DIKO ALAM ANO GAGAWIN JAN -->
                            <!-- <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                                <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
                                    <h5 class="mb-5 text-lg font-semibold dark:text-white-light">Recent Activities</h5>

                                    <div class="perfect-scrollbar relative -mr-3 mb-4 h-[290px] pr-3">
                                        <div class="cursor-pointer text-sm">
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Updated Server Logs</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">Just Now</div>

                                                <span class="badge badge-outline-primary absolute bg-primary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-success ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Send Mail to HR and Admin</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">2 min ago</div>

                                                <span class="badge badge-outline-success absolute bg-success-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-danger ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Backup Files EOD</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">14:00</div>

                                                <span class="badge badge-outline-danger absolute bg-danger-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-black ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Collect documents from Sara</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">16:00</div>

                                                <span class="badge badge-outline-dark absolute bg-dark-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-warning ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Conference call with Marketing Manager.</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                                <span class="badge badge-outline-warning absolute bg-warning-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">In progress</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-info ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Rebooted Server</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                                <span class="badge badge-outline-info absolute bg-info-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-secondary ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Send contract details to Freelancer</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">18:00</div>

                                                <span class="badge badge-outline-secondary absolute bg-secondary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Updated Server Logs</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">Just Now</div>

                                                <span class="badge badge-outline-primary absolute bg-primary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-success ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Send Mail to HR and Admin</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">2 min ago</div>

                                                <span class="badge badge-outline-success absolute bg-success-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-danger ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Backup Files EOD</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">14:00</div>

                                                <span class="badge badge-outline-danger absolute bg-danger-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-black ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Collect documents from Sara</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">16:00</div>

                                                <span class="badge badge-outline-dark absolute bg-dark-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-warning ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Conference call with Marketing Manager.</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                                <span class="badge badge-outline-warning absolute bg-warning-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">In progress</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-info ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Rebooted Server</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                                <span class="badge badge-outline-info absolute bg-info-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                            </div>
                                            <div class="group relative flex items-center py-1.5">
                                                <div class="h-1.5 w-1.5 rounded-full bg-secondary ltr:mr-1 rtl:ml-1.5"></div>
                                                <div class="flex-1">Send contract details to Freelancer</div>
                                                <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">18:00</div>

                                                <span class="badge badge-outline-secondary absolute bg-secondary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-t border-white-light dark:border-white/10">
                                        <a href="javascript:;" class="group group flex items-center justify-center p-4 font-semibold hover:text-primary">
                                            View All
                                            <svg class="h-4 w-4 transition duration-300 group-hover:translate-x-1 ltr:ml-1 rtl:mr-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div> -->
<!-- NAKATAGO NA TRANSACTION SECTION DIKO ALAM ANO GAGAWIN DITO ONCE AGAIN -->
                                <!-- <div class="panel h-full">
                                    <div class="mb-5 flex items-center justify-between dark:text-white-light">
                                        <h5 class="text-lg font-semibold">Transactions</h5>
                                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                            <a href="javascript:;" @click="toggle">
                                                <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                </svg>
                                            </a>
                                            <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                                <li><a href="javascript:;" @click="toggle">Mark as Done</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="space-y-6">
                                            <div class="flex">
                                                <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-success-light text-base text-success dark:bg-success dark:text-success-light">SP</span>
                                                <div class="flex-1 px-3">
                                                    <div>kyuuush</div>
                                                    <div class="text-xs text-white-dark dark:text-gray-500">10 Jan 1:00PM</div>
                                                </div>
                                                <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">+$36.11</span>
                                            </div>
                                            <div class="flex">
                                                <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-warning-light text-warning dark:bg-warning dark:text-warning-light">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                                        <path d="M2 10C2 7.17157 2 5.75736 2.87868 4.87868C3.75736 4 5.17157 4 8 4H13C15.8284 4 17.2426 4 18.1213 4.87868C19 5.75736 19 7.17157 19 10C19 12.8284 19 14.2426 18.1213 15.1213C17.2426 16 15.8284 16 13 16H8C5.17157 16 3.75736 16 2.87868 15.1213C2 14.2426 2 12.8284 2 10Z" stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M19.0003 7.07617C19.9754 7.17208 20.6317 7.38885 21.1216 7.87873C22.0003 8.75741 22.0003 10.1716 22.0003 13.0001C22.0003 15.8285 22.0003 17.2427 21.1216 18.1214C20.2429 19.0001 18.8287 19.0001 16.0003 19.0001H11.0003C8.17187 19.0001 6.75766 19.0001 5.87898 18.1214C5.38909 17.6315 5.17233 16.9751 5.07642 16" stroke="currentColor" stroke-width="1.5"></path>
                                                        <path d="M13 10C13 11.3807 11.8807 12.5 10.5 12.5C9.11929 12.5 8 11.3807 8 10C8 8.61929 9.11929 7.5 10.5 7.5C11.8807 7.5 13 8.61929 13 10Z" stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M16 12L16 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M5 12L5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </span>
                                                <div class="flex-1 px-3">
                                                    <div>Cash withdrawal</div>
                                                    <div class="text-xs text-white-dark dark:text-gray-500">04 Jan 1:00PM</div>
                                                </div>
                                                <span class="whitespace-pre px-1 text-base text-danger ltr:ml-auto rtl:mr-auto">-$16.44</span>
                                            </div>
                                            <div class="flex">
                                                <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-danger-light text-danger dark:bg-danger dark:text-danger-light">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                                        <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    </svg>
                                                </span>
                                                <div class="flex-1 px-3">
                                                    <div>Amy Diaz</div>
                                                    <div class="text-xs text-white-dark dark:text-gray-500">10 Jan 1:00PM</div>
                                                </div>
                                                <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">+$66.44</span>
                                            </div>
                                            <div class="flex">
                                                <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveaspectratio="xMidYMid meet" viewbox="0 0 24 24">
                                                        <path fill="currentColor" d="M5.398 0v.006c3.028 8.556 5.37 15.175 8.348 23.596c2.344.058 4.85.398 4.854.398c-2.8-7.924-5.923-16.747-8.487-24zm8.489 0v9.63L18.6 22.951c-.043-7.86-.004-15.913.002-22.95zM5.398 1.05V24c1.873-.225 2.81-.312 4.715-.398v-9.22z"></path>
                                                    </svg>
                                                </span>
                                                <div class="flex-1 px-3">
                                                    <div>Netflix</div>
                                                    <div class="text-xs text-white-dark dark:text-gray-500">04 Jan 1:00PM</div>
                                                </div>
                                                <span class="whitespace-pre px-1 text-base text-danger ltr:ml-auto rtl:mr-auto">-$32.00</span>
                                            </div>
                                            <div class="flex">
                                                <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-info-light text-base text-info dark:bg-info dark:text-info-light">DA</span>
                                                <div class="flex-1 px-3">
                                                    <div>Daisy Anderson</div>
                                                    <div class="text-xs text-white-dark dark:text-gray-500">10 Jan 1:00PM</div>
                                                </div>
                                                <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">+$10.08</span>
                                            </div>
                                            <div class="flex">
                                                <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-primary-light text-primary dark:bg-primary dark:text-primary-light">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754" stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M13.9259 9.70557L13.9459 9.72481C14.3326 10.0885 14.9492 10.0885 16.1822 10.0885C18.4011 10.0885 19.5105 10.0885 19.8854 10.7615C19.8917 10.7726 19.8977 10.7838 19.9036 10.7951C20.2575 11.4785 19.6151 12.3476 18.3304 14.0858L15.2682 18.2288C13.2888 20.9069 12.2991 22.2459 11.3758 21.9629C10.4524 21.68 10.4524 20.0376 10.4525 16.753L10.4525 16.4434C10.4525 15.2587 10.4525 14.6663 10.074 14.2948L10.054 14.2755" stroke="currentColor" stroke-width="1.5"></path>
                                                    </svg>
                                                </span>
                                                <div class="flex-1 px-3">
                                                    <div>Electricity Bill</div>
                                                    <div class="text-xs text-white-dark dark:text-gray-500">04 Jan 1:00PM</div>
                                                </div>
                                                <span class="whitespace-pre px-1 text-base text-danger ltr:ml-auto rtl:mr-auto">-$22.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
<!-- NAKATAGO NA WALLET SECTION ONCE AGAIN DIKO ALAM ANO GAGAWIN DITO -->
                                <!-- <div class="panel h-full overflow-hidden border-0 p-0">
                                    <div class="min-h-[190px] bg-gradient-to-r from-[#4361ee] to-[#160f6b] p-6">
                                        <div class="mb-6 flex items-center justify-between">
                                            <div class="flex items-center rounded-full bg-black/50 p-1 font-semibold text-white ltr:pr-3 rtl:pl-3">
                                                <img class="block h-8 w-8 rounded-full border-2 border-white/50 object-cover ltr:mr-1 rtl:ml-1" src="assets/images/profile-34.jpeg" alt="image">
                                                kyuuush
                                            </div>
                                            <button type="button" class="flex h-9 w-9 items-center justify-between rounded-md bg-black text-white hover:opacity-80 ltr:ml-auto rtl:mr-auto">
                                                <svg class="m-auto h-6 w-6" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex items-center justify-between text-white">
                                            <p class="text-xl">Wallet Balance</p>
                                            <h5 class="text-2xl ltr:ml-auto rtl:mr-auto"><span class="text-white-light">$</span>2953</h5>
                                        </div>
                                    </div>
                                    <div class="-mt-12 grid grid-cols-2 gap-2 px-8">
                                        <div class="rounded-md bg-white px-4 py-2.5 shadow dark:bg-[#060818]">
                                            <span class="mb-4 flex items-center justify-between dark:text-white">Received
                                                <svg class="h-4 w-4 text-success" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19 15L12 9L5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            <div class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                                                $97.99
                                            </div>
                                        </div>
                                        <div class="rounded-md bg-white px-4 py-2.5 shadow dark:bg-[#060818]">
                                            <span class="mb-4 flex items-center justify-between dark:text-white">Spent
                                                <svg class="h-4 w-4 text-danger" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            <div class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                                                $53.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="mb-5">
                                            <span class="rounded-full bg-[#1b2e4b] px-4 py-1.5 text-xs text-white before:inline-block before:h-1.5 before:w-1.5 before:rounded-full before:bg-white ltr:before:mr-2 rtl:before:ml-2">Pending</span>
                                        </div>
                                        <div class="mb-5 space-y-1">
                                            <div class="flex items-center justify-between">
                                                <p class="font-semibold text-[#515365]">Netflix</p>
                                                <p class="text-base"><span>$</span> <span class="font-semibold">13.85</span></p>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <p class="font-semibold text-[#515365]">BlueHost VPN</p>
                                                <p class="text-base"><span>$</span> <span class="font-semibold">15.66</span></p>
                                            </div>
                                        </div>
                                        <div class="flex justify-around px-2 text-center">
                                            <button type="button" class="btn btn-secondary ltr:mr-2 rtl:ml-2">View Details</button>
                                            <button type="button" class="btn btn-success">Pay Now $29.51</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                                <div class="panel h-full w-full">
                                    <div class="mb-5 flex items-center justify-between">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Recent Orders</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">Customer</th>
                                                    <th>Product</th>
                                                    <th class="ltr:rounded-r-md rtl:rounded-l-md">Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                           <?php foreach($recentOrders as $recentOrder):?>
                                                <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                                
                                                    <td class="min-w-[150px] text-black dark:text-white">
                                                        <div class="flex items-center">
                                                        
                                                        <img
                                                            class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3"
                                                            src="<?= $recentOrder['pfPicture'] ? 'data:image/jpeg;base64,' . base64_encode($recentOrder['pfPicture']) : 'default.jpg' ?>"
                                                            alt="avatar"
                                                        />
                                                            <span class="whitespace-nowrap"><?= $recentOrder['fname'].' '.$recentOrder['lname']?></span>
                                                        </div>
                                                    </td>
                                                    <td class="text-primary"><?= $recentOrder['productName']?></td>
                                                    <?php if($recentOrder['status'] === "delivered"):?>
                                                        <td><span class="badge bg-success shadow-md dark:group-hover:bg-transparent">Delivaered</span></td>
                                                    <?php elseif($recentOrder['status'] === "delivered"):?>
                                                        <td><span class="badge bg-warning shadow-md dark:group-hover:bg-transparent">Processing</span></td>
                                                    <?php else:?>
                                                        <td><span class="badge bg-info shadow-md dark:group-hover:bg-transparent">Pending</span></td>
                                                    <?php endif;?>
                                                </tr>
                                                        
                                            <?php endforeach; ?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel h-full w-full">
                                    <div class="mb-5 flex items-center justify-between">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Customer Favorites – Top 10 Picks</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table>
                                            <thead>
                                                <tr class="border-b-0">
                                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">Product</th>
                                                    <th>Quantity</th>
                                                    
                                                    <!-- <th class="ltr:rounded-r-md rtl:rounded-l-md">Source</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($topProd as $prod):?>
                                                <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                                <td class="min-w-[150px] text-black dark:text-white">
                                                        <div class="flex">
                                                            <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="<?= $prod['image'] ? 'data:image/jpeg;base64,' . base64_encode($prod['image']) : 'default.jpg' ?>" alt="avatar">
                                                            <p class="whitespace-nowrap"><?= $prod['productName']?><span class="block text-xs text-primary"><?= htmlspecialchars($prod['category'])?></span></p>
                                                        </div>
                                                    </td>
                                                    <td><?= htmlspecialchars($prod['totalOrder'])?></td>
                                                    <!-- <td>
                                                        <a class="flex items-center text-danger" href="javascript:;">
                                                            <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.5" d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            </svg>

                                                            Direct
                                                        </a>
                                                    </td> -->
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                                    <div x-data="search">
                            <div class="panel">
                                <div class="mb-5 flex items-center justify-between">
                                    <h5 class="text-lg font-semibold dark:text-white-light">Live Search</h5>
                                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600" href="javascript:;" @click="toggleCode('code1')"><span class="flex items-center">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                                <path d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                            Code</span></a>
                                </div>
                              

                     
                    <!-- end main content section -->
                </div>

                  <!-- <div x-data="multipleTable">
                        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
                           
                        </div>
                        <div class="panel mt-6">
                            <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">All Cities</h5>
                            <table id="myTable1" class="whitespace-nowrap"></table>
                        </div>
                       
                    </div> -->

                <!-- start footer section -->
                <div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. kyuuush All rights reserved.
                </div>
                
            </div>
        </div>

      <script>
            //GRAPH FOR EXPENSES AND REVENUES 
            const monthlyRevenue =<?= json_encode($monthlyRevenue)?>;
            const maxRevenueIndex = monthlyRevenue.indexOf(Math.max(...monthlyRevenue));
            const monthlyExpenses =<?= json_encode(value: $monthlyExpenses)?>;
            const maxExpensesIndex = monthlyExpenses.indexOf(Math.max(...monthlyExpenses));

            // PIE CHART FOR ORDER BY CATEGORY
            
            const categories =<?= json_encode($categories,JSON_HEX_TAG)?>;
            const percentage =<?= json_encode($percentage,JSON_HEX_TAG)?>;
            let formattedPercentage = percentage.map(val => parseFloat(val));

            // for total orders
            const monthlyOrder = <?= json_encode($monthlyOrder)?>;
            // for daily orders
            const currentWeek = <?= json_encode($currentWeek)?> 
            const lastWeek = <?= json_encode($lastWeek)?>

            // available courier

            const availableCouriers = <?= json_encode($courier)?>;


            // const maxExpensesIndex = expensesData.indexOf(Math.max(...expensesData));
            document.addEventListener('alpine:init', () => {

                // Alpine.data('multipleTable', () => ({
              
                //     datatable2: null,
                //     init() {

                //         this.datatable2 = new simpleDatatables.DataTable('#myTable1', {
                //             data: {
                //                 headings: ['ID', 'Name'],
                //                 data: availableCouriers.map((product) => ({
                //                     product.employeeID,
                                
                //                 })),
                //             },
                //             searchable: true,
                //             perPage: 10,
                //             perPageSelect: [10, 20, 30, 50, 100],
                //             columns: [
                //                 {
                //                     select: 0,
                //                     render: (data, cell, row) => {
                //                         return `<a href="?action=citydata&cityName=${encodeURIComponent(data)}"><div class="flex items-center w-max">${data}</div></a>`;
                //                     },
                //                     sort: 'asc',
                //                 },
                //                 {
                //                     select: 1,
                //                     sortable: false,
                //                     render: (data, cell, row) => {
                //                         return `<div class="w-4/5 min-w-[100px] h-2.5 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex"> <div class="bg-${this.randomColor()} h-2.5 rounded-full rounded-bl-full text-center text-white text-xs" style="width:${parseInt(data)}%"></div> </div>`;
                //                     },
                //                 },
                //                 // {
                //                 //     select: 3,
                //                 //     render: (data, cell, row) => {
                //                 //         return this.formatDate(data);
                //                 //     },
                //                 // },
                //                 // {
                //                 //     select: 6,
                //                 //     sortable: false,
                //                 //     render: (data, cell, row) => {
                //                 //         return `<div class="flex items-center">
                //                 //             <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Edit">
                //                 //                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                //                 //                     <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                //                 //                     <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                //                 //                 </svg>
                //                 //             </button>
                //                 //             <button type="button" x-tooltip="Delete">
                //                 //                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                //                 //                     <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                //                 //                     <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                //                 //                     <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                //                 //                     <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                //                 //                     <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                //                 //                 </svg>
                //                 //             </button>
                //                 //         </div>`;
                //                 //     },
                //                 // },
                //             ],
                //             firstLast: true,
                //             firstText:
                //                 '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                //             lastText:
                //                 '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                //             prevText:
                //                 '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                //             nextText:
                //                 '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                //             labels: {
                //                 perPage: '{select}',
                //             },
                //             layout: {
                //                 top: '{search}',
                //                 bottom: '{info}{select}{pager}',
                //             },
                //         });
                //     },

                //     formatDate(date) {
                //         if (date) {
                //             const dt = new Date(date);
                //             const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() + 1;
                //             const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                //             return day + '/' + month + '/' + dt.getFullYear();
                //         }
                //         return '';
                //     },

                //     randomColor() {
                //         const color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                //         const random = Math.floor(Math.random() * color.length);
                //         return color[random];
                //     },

                //     randomStatus() {
                //         const status = ['PAID', 'APPROVED', 'FAILED', 'CANCEL', 'SUCCESS', 'PENDING', 'COMPLETE'];
                //         const random = Math.floor(Math.random() * status.length);
                //         return status[random];
                //     },
                // }));

                
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
                            message: '<strong class="text-sm mr-1">kyuuush</strong>invite you to <strong>Prototyping</strong>',
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

                // content section
                Alpine.data('sales', () => ({
                    init() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        const revenueChart = null;
                        const salesByCategory = null;
                        const dailySales = null;
                        const totalOrders = null;

                        // revenue
                        setTimeout(() => {
                            this.revenueChart = new ApexCharts(this.$refs.revenueChart, this.revenueChartOptions);
                            this.$refs.revenueChart.innerHTML = '';
                            this.revenueChart.render();

                            // sales by category
                            this.salesByCategory = new ApexCharts(this.$refs.salesByCategory, this.salesByCategoryOptions);
                            this.$refs.salesByCategory.innerHTML = '';
                            this.salesByCategory.render();

                            // daily sales
                            this.dailySales = new ApexCharts(this.$refs.dailySales, this.dailySalesOptions);
                            this.$refs.dailySales.innerHTML = '';
                            this.dailySales.render();

                            // total orders
                            this.totalOrders = new ApexCharts(this.$refs.totalOrders, this.totalOrdersOptions);
                            this.$refs.totalOrders.innerHTML = '';
                            this.totalOrders.render();
                        }, 300);

                        this.$watch('$store.app.theme', () => {
                            isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;

                            this.revenueChart.updateOptions(this.revenueChartOptions);
                            this.salesByCategory.updateOptions(this.salesByCategoryOptions);
                            this.dailySales.updateOptions(this.dailySalesOptions);
                            this.totalOrders.updateOptions(this.totalOrdersOptions);
                        });

                        this.$watch('$store.app.rtlClass', () => {
                            isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                            this.revenueChart.updateOptions(this.revenueChartOptions);
                        });
                    },
                    
                    // revenue
                    get revenueChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Income',
                                    data: monthlyRevenue,
                                },
                                {
                                    name: 'Expenses',
                                    data: monthlyExpenses,
                                },
                            ],
                            chart: {
                                height: 325,
                                type: 'area',
                                fontFamily: 'Nunito, sans-serif',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                curve: 'smooth',
                                width: 2,
                                lineCap: 'square',
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22,
                            },
                            colors: isDark ? ['#2196f3', '#e7515a'] : ['#1b55e2', '#e7515a'],
                            markers: {
                                discrete: [
                                    {
                                        seriesIndex: 0,
                                        dataPointIndex: maxRevenueIndex,
                                        fillColor: '#1b55e2',
                                        strokeColor: 'transparent',
                                        size: 7,
                                    },
                                    {
                                        seriesIndex: 1,
                                        dataPointIndex: maxExpensesIndex,
                                        fillColor: '#e7515a',
                                        strokeColor: 'transparent',
                                        size: 7,
                                    },
                                ],
                            },
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            xaxis: {
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                crosshairs: {
                                    show: true,
                                },
                                labels: {
                                    offsetX: isRtl ? 2 : 0,
                                    offsetY: 5,
                                    style: {
                                        fontSize: '12px',
                                        cssClass: 'apexcharts-xaxis-title',
                                    },
                                },
                            },
                            yaxis: {
                                tickAmount: 7,
                                labels: {
                                    formatter: (value) => {
                                        return value / 1000 + 'K';
                                    },
                                    offsetX: isRtl ? -30 : -10,
                                    offsetY: 0,
                                    style: {
                                        fontSize: '12px',
                                        cssClass: 'apexcharts-yaxis-title',
                                    },
                                },
                                opposite: isRtl ? true : false,
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                                strokeDashArray: 5,
                                xaxis: {
                                    lines: {
                                        show: true,
                                    },
                                },
                                yaxis: {
                                    lines: {
                                        show: false,
                                    },
                                },
                                padding: {
                                    top: 0,
                                    right: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            legend: {
                                position: 'top',
                                horizontalAlign: 'right',
                                fontSize: '16px',
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -2,
                                },
                                itemMargin: {
                                    horizontal: 10,
                                    vertical: 5,
                                },
                            },
                            tooltip: {
                                marker: {
                                    show: true,
                                },
                                x: {
                                    show: false,
                                },
                                y: {
                                    formatter: function (value) {
                                        return "$" + value.toFixed(2); 
                                    },
                                },
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shadeIntensity: 1,
                                    inverseColors: !1,
                                    opacityFrom: isDark ? 0.19 : 0.28,
                                    opacityTo: 0.05,
                                    stops: isDark ? [100, 100] : [45, 100],
                                },
                            },
                        };
                    },

                    // sales by category
                    get salesByCategoryOptions() {
                        return {
                            series: formattedPercentage,
                            chart: {
                                type: 'donut',
                                height: 460,
                                fontFamily: 'Nunito, sans-serif',
                            },
                            dataLabels: {
                                enabled: true, // <--- ENABLE datalabels to show percentage on each slice
                                
                            },
                            stroke: {
                                show: true,
                                width: 20,
                                colors: isDark ? '#0e1726' : '#fff',
                            },
                            colors: isDark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#7b52ff', '#ff7b7b', '#f9a500', '#52c1f5', '#ff6347', '#8e44ad', '#2ecc71']
                            : ['#e2a03f', '#5c1ac3', '#e7515a', '#ff8c00', '#6b8e23', '#00bfff', '#ff6347', '#ff69b4', '#32cd32', '#ff4500'],
                            legend: {
                                position: 'top',
                                horizontalAlign: 'center',
                                fontSize: '14px',
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -2,
                                },
                                height: 50,
                                offsetY: 20,
                            },
                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: '65%',
                                        background: 'transparent',
                                        labels: {
                                            show: true,
                                            name: {
                                                show: true,
                                                fontSize: '29px',
                                                offsetY: -10,
                                            },
                                            value: {
                                                show: true,
                                                fontSize: '26px',
                                                color: isDark ? '#bfc9d4' : undefined,
                                                offsetY: 16,
                                                formatter: (val) => {
                                                    return val;
                                                },
                                            },
                                            total: {
                                                show: true,
                                                label: 'Total',
                                                color: '#888ea8',
                                                fontSize: '29px',
                                                formatter: (w) => {
                                                    return "100.00%"
                                                },
                                            },
                                        },
                                    },
                                },
                            },
                            labels: categories,
                            states: {
                                hover: {
                                    filter: {
                                        type: 'none',
                                        value: 0.15,
                                    },
                                },
                                active: {
                                    filter: {
                                        type: 'none',
                                        value: 0.15,
                                    },
                                },
                            },
                        };
                        

                    },

                    // daily sales
                    get dailySalesOptions() {
                        return {
                            series: [
                                {
                                    name: 'Orders',
                                    data: currentWeek
                                },
                                {
                                    name: 'Last Week',
                                    data: lastWeek,
                                },
                            ],
                            chart: {
                                height: 160,
                                type: 'bar',
                                fontFamily: 'Nunito, sans-serif',
                                toolbar: {
                                    show: false,
                                },
                                stacked: true,
                                stackType: '100%',
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 1,
                            },
                            colors: ['#5c1ac3', '#e2a03f', '#e7515a', '#2196f3', '#4caf50', '#ff5722', '#9c27b0', '#00bcd4']
                            ,
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 0,
                                        },
                                    },
                                },
                            ],
                            xaxis: {
                                labels: {
                                    show: false,
                                },
                                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                            },
                            yaxis: {
                                show: false,
                            },
                            fill: {
                                opacity: 1,
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '25%',
                                },
                            },
                            legend: {
                                show: false,
                            },
                            grid: {
                                show: false,
                                xaxis: {
                                    lines: {
                                        show: false,
                                    },
                                },
                                padding: {
                                    top: 10,
                                    right: -20,
                                    bottom: -20,
                                    left: -20,
                                },
                            },
                        };
                    },

                    // total orders
                    get totalOrdersOptions() {
                        return {
                            series: [
                                {
                                    name: 'Placed Orders',
                                    data: monthlyOrder,
                                },
                            ],
                            chart: {
                                height: 290,
                                type: 'area',
                                fontFamily: 'Nunito, sans-serif',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2,
                            },
                            colors: isDark ? ['#00ab55'] : ['#00ab55'],
                            labels:  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            yaxis: {
                                min: 0,
                                show: false,
                            },
                            grid: {
                                padding: {
                                    top: 20,
                                    right: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            fill: {
                                opacity: 1,
                                type: 'gradient',
                                gradient: {
                                    type: 'vertical',
                                    shadeIntensity: 1,
                                    inverseColors: !1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.05,
                                    stops: [100, 100],
                                },
                            },
                            tooltip: {
                                x: {
                                    show: true,
                                    
                                },
                            },

                            
                        };
                    },
                }));
            });
        </script>
    </body>