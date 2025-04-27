
    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

            <div class="main-content flex flex-col min-h-screen">
    

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="analytics">
                        <ul class="flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                            </li>
                            <li class="before:mr-1 before:content-['/'] rtl:before:ml-1">
                                <span>Demographics</span>
                            </li>
                        </ul>

                            <div class="mb-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="panel h-full">
                                        <div class="mb-5 flex items-center">
                                            <h5 class="text-lg font-semibold dark:text-white-light">Customers By Age</h5>
                                        </div>
                                        <div class="overflow-hidden">
                                            <div x-ref="customerByAge" class="rounded-lg bg-white dark:bg-black">
                                                <!-- loader -->
                                                <div class="grid min-h-[353px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="panel h-full">
                                        <div class="mb-5 flex items-center">
                                            <h5 class="text-lg font-semibold dark:text-white-light">Customers By City</h5>
                                        </div>
                                        <div class="overflow-hidden">
                                            <div x-ref="customerByCity" class="rounded-lg bg-white dark:bg-black">
                                                <!-- loader -->
                                                <div class="grid min-h-[353px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="panel h-full">
                                        <div class="mb-5 flex items-center">
                                            <h5 class="text-lg font-semibold dark:text-white-light">Customers By City</h5>
                                        </div>
                                        <div class="overflow-hidden">
                                            <div x-ref="customerByCity" class="rounded-lg bg-white dark:bg-black">
                                                <!-- loader -->
                                                <div class="grid min-h-[353px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>            
                            </div>
                            

                            <div class="mb-6 grid gap-6 sm:grid-cols-3 xl:grid-cols-5">

                                
                                <div class="panel h-full sm:col-span-3 xl:col-span-2">
                                    <div class="mb-5 flex items-start justify-between">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Customers By Gender</h5>
                                    </div>
                                    <div class="flex flex-col space-y-5">
                                        <div class="flex items-center">
                                            <div class="h-9 w-9">
                                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-primary/10 text-primary dark:bg-primary dark:text-white-light">
                                     
                                            <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                width="18px" height="18px" viewBox="0 0 393.739 393.739"
                                                xml:space="preserve">
                                            <g>
                                                <path d="M370.907,0h-93.048c-9.091,0-16.455,7.365-16.455,16.45c0,9.085,7.364,16.453,16.455,16.453h43.19L217.25,136.704
                                                    c-21.049-12.879-45.768-20.318-72.194-20.318c-76.468,0-138.679,62.208-138.679,138.676c0,76.474,62.211,138.678,138.679,138.678
                                                    s138.678-62.204,138.678-138.678c0-33.07-11.655-63.455-31.037-87.314L354.462,65.985v49.231c0,9.085,7.365,16.452,16.444,16.452
                                                    c9.09,0,16.455-7.367,16.455-16.452V16.45C387.362,7.365,379.997,0,370.907,0z M145.056,346.737
                                                    c-50.546,0-91.673-41.127-91.673-91.676c0-50.543,41.121-91.667,91.673-91.667c50.546,0,91.664,41.124,91.664,91.667
                                                    C236.72,305.61,195.602,346.737,145.056,346.737z"/>
                                            </g>
                                            </svg>
                                                </div>
                                            </div>
                                            <div class="w-full flex-initial px-3">
                                                <div class="w-summary-info mb-1 flex justify-between font-semibold text-white-dark">
                                                    <h6>Male</h6>
                                                    <p id="male-percentage" class="text-xs ltr:ml-auto rtl:mr-auto">0%</p>
                                                </div>
                                                <div>
                                                    <div class="h-5 w-full overflow-hidden rounded-full bg-dark-light p-1 shadow-3xl dark:bg-dark-light/10 dark:shadow-none">
                                                        <div id="male-bar" class="relative h-full w-full rounded-full bg-gradient-to-r from-[#009ffd] to-[#2a2a72] before:absolute before:inset-y-0 before:m-auto before:h-2 before:w-2 before:rounded-full before:bg-white ltr:before:right-0.5 rtl:before:left-0.5" style="width: 65%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="h-9 w-9">
                                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-danger/10 text-danger dark:bg-danger dark:text-white-light">
                                                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                    width="18px" height="18px" viewBox="0 0 52.857 52.857"
                                                    xml:space="preserve">
                                                <g>
                                                    <path d="M43.021,16.593C43.021,7.444,35.579,0,26.43,0C17.28,0,9.836,7.443,9.836,16.593c0,8.425,6.316,15.387,14.459,16.438
                                                        v10.109h-4.213c-1.178,0-2.133,0.955-2.133,2.133s0.955,2.133,2.133,2.133h4.213v3.318c0,1.178,0.955,2.133,2.135,2.133
                                                        c1.177,0,2.132-0.955,2.132-2.133v-3.318h4.213c1.181,0,2.136-0.955,2.136-2.133s-0.955-2.133-2.136-2.133h-4.213V33.031
                                                        C36.706,31.979,43.021,25.018,43.021,16.593z M14.104,16.593c0-6.797,5.529-12.326,12.326-12.326
                                                        c6.794,0,12.326,5.529,12.326,12.326c0,6.797-5.531,12.326-12.326,12.326C19.633,28.919,14.104,23.39,14.104,16.593z"/>
                                                </g>
                                                </svg>
                                                </div>
                                            </div>
                                            <div class="w-full flex-initial px-3">
                                                <div class="w-summary-info mb-1 flex justify-between font-semibold text-white-dark">
                                                    <h6>Female</h6>
                                                    <p id="female-percentage" class="text-xs ltr:ml-auto rtl:mr-auto">0%</p>
                                                </div>
                                                <div>
                                                    <div class="h-5 w-full overflow-hidden rounded-full bg-dark-light p-1 shadow-3xl dark:bg-dark-light/10 dark:shadow-none">
                                                        <div id="female-bar" class="relative h-full w-full rounded-full bg-gradient-to-r from-[#a71d31] to-[#3f0d12] before:absolute before:inset-y-0 before:m-auto before:h-2 before:w-2 before:rounded-full before:bg-white ltr:before:right-0.5 rtl:before:left-0.5" style="width: 40%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="h-9 w-9">
                                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-warning/10 text-warning dark:bg-warning dark:text-white-light">
                                                <svg fill="#000000" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                    viewBox="0 0 504.198 504.198" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path d="M346.19,359.61c-9.122-2.21-18.381,3.43-20.591,12.587c-5.504,22.81-17.237,43.691-33.92,60.373
                                                                c-24.175,24.175-56.311,37.495-90.505,37.495s-66.338-13.321-90.513-37.495c-24.175-24.175-37.487-56.32-37.487-90.505
                                                                c0-34.193,13.312-66.338,37.487-90.513s56.32-37.495,90.513-37.495s66.33,13.321,90.505,37.495
                                                                c8.388,8.388,15.548,17.826,21.265,28.058c4.617,8.226,15.036,11.153,23.228,6.554c8.226-4.608,11.17-15.01,6.562-23.236
                                                                c-7.262-12.962-16.307-24.909-26.923-35.507c-30.609-30.626-71.33-47.497-114.637-47.497c-37.717,0-73.446,12.817-102.272,36.343
                                                                l-24.269-24.269l17.801-17.801c6.665-6.665,6.665-17.468,0-24.132c-6.673-6.664-17.468-6.664-24.132,0l-17.801,17.801
                                                                l-9.267-9.267c-6.673-6.664-17.468-6.664-24.132,0c-6.673,6.665-6.673,17.468,0,24.132l9.267,9.267L8.569,209.798
                                                                c-6.673,6.665-6.673,17.468,0,24.132c3.328,3.337,7.697,5.001,12.066,5.001c4.361,0,8.73-1.664,12.066-5.001l17.801-17.801
                                                                l24.354,24.363c-23.168,28.706-35.814,64.154-35.814,101.572c0,43.307,16.862,84.019,47.488,114.637
                                                                c30.618,30.626,71.339,47.497,114.645,47.497c43.307,0,84.028-16.87,114.637-47.488c21.137-21.128,35.994-47.582,42.974-76.501
                                                                C360.987,371.036,355.355,361.82,346.19,359.61z"/>
                                                            <path d="M483.568,0h-59.733c-9.421,0-17.067,7.646-17.067,17.067c0,9.421,7.646,17.067,17.067,17.067h17.929l-27.034,27.034
                                                                c-29.474-25.651-66.688-39.782-106.146-39.782c-43.307,0-84.028,16.862-114.645,47.488
                                                                c-23.697,23.697-39.27,53.615-45.047,86.519c-1.63,9.284,4.574,18.133,13.858,19.763c9.353,1.647,18.133-4.582,19.763-13.858
                                                                c4.557-25.967,16.845-49.579,35.558-68.292c24.183-24.175,56.32-37.487,90.513-37.487c34.193,0,66.338,13.312,90.513,37.487
                                                                c49.903,49.911,49.903,131.115,0,181.026c-24.175,24.175-56.32,37.487-90.513,37.487c-34.193,0-66.33-13.312-90.513-37.487
                                                                c-8.883-8.883-16.375-18.944-22.281-29.901c-4.454-8.303-14.797-11.418-23.117-6.946c-8.294,4.471-11.401,14.822-6.929,23.117
                                                                c7.467,13.892,16.956,26.633,28.194,37.862c30.618,30.626,71.339,47.488,114.645,47.488s84.028-16.862,114.645-47.488
                                                                c30.626-30.618,47.479-71.339,47.479-114.645c0-35.635-11.58-69.427-32.691-97.374l28.484-28.484V76.8
                                                                c0,9.421,7.646,17.067,17.067,17.067c9.421,0,17.067-7.646,17.067-17.067V17.067C500.635,7.646,492.989,0,483.568,0z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                                </svg>
                                                </div>
                                            </div>
                                            <div class="w-full flex-initial px-3">
                                                <div class="w-summary-info mb-1 flex justify-between font-semibold text-white-dark">
                                                    <h6>Others</h6>
                                                    <p id="others-percentage" class="text-xs ltr:ml-auto rtl:mr-auto">0%</p>
                                                </div>
                                                <div>
                                                    <div class="h-5 w-full overflow-hidden rounded-full bg-dark-light p-1 shadow-3xl dark:bg-dark-light/10 dark:shadow-none">
                                                        <div id="others-bar" class="relative h-full w-full rounded-full bg-gradient-to-r from-[#fe5f75] to-[#fc9842] before:absolute before:inset-y-0 before:m-auto before:h-2 before:w-2 before:rounded-full before:bg-white ltr:before:right-0.5 rtl:before:left-0.5" style="width: 25%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                
                </div>
            
                <!-- start footer section -->
                <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. kyuuush All rights reserved.
                </div>
                <!-- end footer section -->
            </div>
        </div>
        <?php var_dump($cities,$cityPercentage)?>
        <script>
            // For age group danut chart\
            const ageGroup = <?= json_encode($ageGroup)?>;
            const ageGroupPercentage = <?= json_encode($ageGroupPercentage)?>;
            let formattedAgeGroupPercentage = ageGroupPercentage.map(val => parseFloat(val));
           
            const cities = <?= json_encode($cities)?>;
            const cityPercentage = <?= json_encode($cityPercentage)?>;
            let formattedCityPercentage = cityPercentage.map(val1 => parseFloat(val1));

            // Visitors by genders
            const gender = <?php echo json_encode($gender); ?>;
            const percentage = <?php echo json_encode($percentage); ?>;
            
            
            async function fetchAndUpdateGenderStats() {
                try {
                    // Dynamically update the percentages and progress bars for each gender
                    gender.forEach((gender, index) => {
                        const genderPercentage = percentage[index];
                        updateGenderProgressBar(gender, genderPercentage);
                    });
                } catch (error) {
                    console.error('Error fetching gender stats:', error);
                }
            }

            // Function to update the progress bar and percentage for gender
            function updateGenderProgressBar(gender, percentage) {
                const bar = document.getElementById(`${gender}-bar`);
                const percentageElement = document.getElementById(`${gender}-percentage`);
                
                // Update the width of the progress bar
                bar.style.width = `${percentage}%`;

                // Update the text displaying the percentage
                percentageElement.textContent = `${percentage}%`;
            }

            // Call the function to fetch and update stats when the page loads
            window.onload = fetchAndUpdateGenderStats

            // main section
            document.addEventListener('alpine:init', () => {
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
                // total-visit
                Alpine.data('analytics', () => ({
                    init() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        const totalVisit = null;
                        const paidVisit = null;
                        const uniqueVisitorSeries = null;
                        const followers = null;
                        const referral = null;
                        const customerByAge = null;
                        const customerByCity = null;
                        const engagement = null;
                        
                        // statistics
                        setTimeout(() => {

                            // sales by category
                            

                            // this.totalVisit = new ApexCharts(this.$refs.totalVisit, this.totalVisitOptions);
                            // this.totalVisit.render();

                            // this.paidVisit = new ApexCharts(this.$refs.paidVisit, this.paidVisitOptions);
                            // this.paidVisit.render();

                            // unique visitors
                            // this.uniqueVisitorSeries = new ApexCharts(this.$refs.uniqueVisitorSeries, this.uniqueVisitorSeriesOptions);
                            // this.$refs.uniqueVisitorSeries.innerHTML = '';
                            // this.uniqueVisitorSeries.render();

                            // followers
                            // this.followers = new ApexCharts(this.$refs.followers, this.followersOptions);
                            // this.followers.render();

                            // referral
                            // this.referral = new ApexCharts(this.$refs.referral, this.referralOptions);
                            // this.referral.render();
                            
                            
                            this.customerByAge = new ApexCharts(this.$refs.customerByAge, this.customerByAgeOptions);
                            this.$refs.customerByAge.innerHTML = '';
                            this.customerByAge.render();
                            
                            this.customerByCity = new ApexCharts(this.$refs.customerByCity, this.customerByCityOptions);
                            this.$refs.customerByCity.innerHTML = '';
                            this.customerByCity.render();

                            

                            // engagement
                            // this.engagement = new ApexCharts(this.$refs.engagement, this.engagementOptions);
                            // this.engagement.render();
                        }, 300);

                        this.$watch('$store.app.theme', () => {
                            isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;
                            // this.totalVisit.updateOptions(this.totalVisitOptions);
                            // this.paidVisit.updateOptions(this.paidVisitOptions);
                            // this.uniqueVisitorSeries.updateOptions(this.uniqueVisitorSeriesOptions);
                            // this.followers.updateOptions(this.followersOptions);
                            // this.referral.updateOptions(this.referralOptions);
                            this.customerByAge.updateOptions(this.customerByAgeOptions);
                            this.customerByCity.updateOptions(this.customerByCityOptions);
                            // this.engagement.updateOptions(this.engagementOptions);
                        });

                        this.$watch('$store.app.rtlClass', () => {
                            isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                            this.uniqueVisitorSeries.updateOptions(this.uniqueVisitorSeriesOptions);
                        });
                    },

                    get customerByAgeOptions() {
                        return {
                            series: formattedAgeGroupPercentage,
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
                                show:true,
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
                                                fontSize: '20px',
                                                formatter: (w) => {
                                                    return "100.00%"
                                                },
                                            },
                                        },
                                    },
                                },
                            },
                            labels:ageGroup,
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


                    get customerByCityOptions() {
                        return {
                            series: formattedCityPercentage,
                            chart: {
                                type: 'donut',
                                height: 460,
                                fontFamily: 'Nunito, sans-serif',
                                background: 'transparent', // <--- very important!
                                foreColor: isDark ? '#bfc9d4' : '#333', // <--- legend text and labels color
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
                                labels: {
                                    colors: isDark ? '#bfc9d4' : '#333', // <--- force brighter legend label colors
                                    useSeriesColors: false, 
                                },
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -2,
                                },
                                height: 60,
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
                                                formatter: (val1) => {
                                                    return val1;
                                                },
                                            },
                                            total: {
                                                show: true,
                                                label: 'Total',
                                                color: '#888ea8',
                                                fontSize: '20px',
                                                formatter: (w) => {
                                                    return "100.00%"
                                                },
                                            },
                                        },
                                    },
                                },
                            },
                            labels:cities,
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

                    // statistics
                    get totalVisitOptions() {
                        return {
                            series: [
                                {
                                    data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25],
                                },
                            ],
                            chart: {
                                height: 58,
                                type: 'line',
                                fontFamily: 'Nunito, sans-serif',
                                sparkline: {
                                    enabled: true,
                                },
                                dropShadow: {
                                    enabled: true,
                                    blur: 3,
                                    color: '#009688',
                                    opacity: 0.4,
                                },
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2,
                            },
                            colors: ['#009688'],
                            grid: {
                                padding: {
                                    top: 5,
                                    bottom: 5,
                                    left: 5,
                                    right: 5,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                        };
                    },

                    //paid visit
                    get paidVisitOptions() {
                        return {
                            series: [
                                {
                                    data: [22, 19, 30, 47, 32, 44, 34, 55, 41, 69],
                                },
                            ],
                            chart: {
                                height: 58,
                                type: 'line',
                                fontFamily: 'Nunito, sans-serif',
                                sparkline: {
                                    enabled: true,
                                },
                                dropShadow: {
                                    enabled: true,
                                    blur: 3,
                                    color: '#e2a03f',
                                    opacity: 0.4,
                                },
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2,
                            },
                            colors: ['#e2a03f'],
                            grid: {
                                padding: {
                                    top: 5,
                                    bottom: 5,
                                    left: 5,
                                    right: 5,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                        };
                    },

                    // unique visitors
                    get uniqueVisitorSeriesOptions() {
                        return {
                            series: [
                                {
                                    name: 'Direct',
                                    data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63],
                                },
                                {
                                    name: 'Organic',
                                    data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70],
                                },
                            ],
                            chart: {
                                height: 360,
                                type: 'bar',
                                fontFamily: 'Nunito, sans-serif',
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                width: 2,
                                colors: ['transparent'],
                            },
                            colors: ['#5c1ac3', '#ffbb44'],
                            dropShadow: {
                                enabled: true,
                                blur: 3,
                                color: '#515365',
                                opacity: 0.4,
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    borderRadius: 10,
                                },
                            },
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center',
                                fontSize: '14px',
                                itemMargin: {
                                    horizontal: 8,
                                    vertical: 8,
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                                padding: {
                                    left: 20,
                                    right: 20,
                                },
                            },
                            xaxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                axisBorder: {
                                    show: true,
                                    color: isDark ? '#3b3f5c' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                tickAmount: 6,
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -10 : 0,
                                },
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shade: isDark ? 'dark' : 'light',
                                    type: 'vertical',
                                    shadeIntensity: 0.3,
                                    inverseColors: false,
                                    opacityFrom: 1,
                                    opacityTo: 0.8,
                                    stops: [0, 100],
                                },
                            },
                            tooltip: {
                                marker: {
                                    show: true,
                                },
                                y: {
                                    formatter: (val) => {
                                        return val;
                                    },
                                },
                            },
                        };
                    },

                    // followers
                    get followersOptions() {
                        return {
                            series: [
                                {
                                    data: [38, 60, 38, 52, 36, 40, 28],
                                },
                            ],
                            chart: {
                                height: 160,
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
                            colors: ['#4361ee'],
                            grid: {
                                padding: {
                                    top: 5,
                                },
                            },
                            yaxis: {
                                show: false,
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },

                            if(isDark) {
                                option['fill'] = {
                                    type: 'gradient',
                                    gradient: {
                                        type: 'vertical',
                                        shadeIntensity: 1,
                                        inverseColors: !1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.05,
                                        stops: [100, 100],
                                    },
                                };
                            },
                        };
                    },

                    // referral
                    get referralOptions() {
                        return {
                            series: [
                                {
                                    data: [60, 28, 52, 38, 40, 36, 38],
                                },
                            ],
                            chart: {
                                height: 160,
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
                            colors: ['#e7515a'],
                            grid: {
                                padding: {
                                    top: 5,
                                },
                            },
                            yaxis: {
                                show: false,
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },

                            if(isDark) {
                                option['fill'] = {
                                    type: 'gradient',
                                    gradient: {
                                        type: 'vertical',
                                        shadeIntensity: 1,
                                        inverseColors: !1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.05,
                                        stops: [100, 100],
                                    },
                                };
                            },
                        };
                    },

                    // engagement
                    get engagementOptions() {
                        return {
                            series: [
                                {
                                    name: 'Sales',
                                    data: [28, 50, 36, 60, 38, 52, 38],
                                },
                            ],
                            chart: {
                                height: 160,
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
                            colors: ['#1abc9c'],
                            grid: {
                                padding: {
                                    top: 5,
                                },
                            },
                            yaxis: {
                                show: false,
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },

                            if(isDark) {
                                option['fill'] = {
                                    type: 'gradient',
                                    gradient: {
                                        type: 'vertical',
                                        shadeIntensity: 1,
                                        inverseColors: !1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.05,
                                        stops: [100, 100],
                                    },
                                };
                            },
                        };
                    },
                }));
            });
        </script>
    </body>
</html>
