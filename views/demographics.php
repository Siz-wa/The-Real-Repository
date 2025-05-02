
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
                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto text-sm">
                                            <a href="javascript:;" @click="toggle">
                                                <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                </svg>
                                            </a>
                                            <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                                <?php foreach($ageGroup as $group):?>
                                                    <li><a href="../public/index.php?action=agegroupsdata&ageGroup=<?=urlencode($group)?>">See <?= htmlspecialchars($group)?> Details</a></li>
                                                <?php endforeach; ?>    
                                                <li><a href="../public/index.php?action=agegroups">See All Details</a></li>
                                            </ul>
                                            </div>
                                            
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
                                            <h5 class="text-lg font-semibold dark:text-white-light">Customers By Top Cities</h5>

                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto text-sm">
                                            <a href="javascript:;" @click="toggle">
                                                <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                </svg>
                                            </a>
                                            <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                                <?php foreach($cities as $city):?>
                                                    <li><a href="../public/index.php?action=citydata&cityName=<?=urlencode($city)?>">See <?= htmlspecialchars($city)?> Details</a></li>
                                                <?php endforeach; ?>    
                                                <li><a href="../public/index.php?action=cities">See Details</a></li>
                                            </ul>
                                            </div>

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
                                            <h5 class="text-lg font-semibold dark:text-white-light">Customers By Gender</h5>

                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto">
                                            <a href="javascript:;" @click="toggle">
                                                <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                </svg>
                                            </a>
                                            <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto text-sm">
                                                <?php foreach($gender as $genderd):?>
                                                    <li><a href="../public/index.php?action=genderdata&gender=<?=urlencode($genderd)?>">See <?= htmlspecialchars($genderd)?> Details</a></li>
                                                <?php endforeach; ?>    
                                                <li><a href="../public/index.php?action=genders">See Details</a></li>
                                            </ul>
                                            </div>

                                        </div>
                                        
                                        <div class="overflow-hidden">
                                            <div x-ref="customerByGender" class="rounded-lg bg-white dark:bg-black">
                                                <!-- loader -->
                                                <div class="grid min-h-[353px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    
                            </div>
                            

                            <div class="mb-6 grid gap-6 sm:grid-cols-3 xl:grid-cols-5">

                      
                </div>             
                <!-- start footer section -->
                <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. kyuuush All rights reserved.
                </div>
                <!-- end footer section -->
            </div>
        </div>
    
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
            let formattedGenderPercentage = percentage.map(val2 => parseFloat(val2));
            
            
            // async function fetchAndUpdateGenderStats() {
            //     try {
            //         // Dynamically update the percentages and progress bars for each gender
            //         gender.forEach((gender, index) => {
            //             const genderPercentage = percentage[index];
            //             updateGenderProgressBar(gender, genderPercentage);
            //         });
            //     } catch (error) {
            //         console.error('Error fetching gender stats:', error);
            //     }
            // }

            // // Function to update the progress bar and percentage for gender
            // function updateGenderProgressBar(gender, percentage) {
            //     const bar = document.getElementById(`${gender}-bar`);
            //     const percentageElement = document.getElementById(`${gender}-percentage`);
                
            //     // Update the width of the progress bar
            //     bar.style.width = `${percentage}%`;

            //     // Update the text displaying the percentage
            //     percentageElement.textContent = `${percentage}%`;
            // }

            // // Call the function to fetch and update stats when the page loads
            // window.onload = fetchAndUpdateGenderStats

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
                        const customerByGender = null;
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
                            
                            this.customerByGender = new ApexCharts(this.$refs.customerByGender, this.customerByGenderOptions);
                            this.$refs.customerByGender.innerHTML = '';
                            this.customerByGender.render();

                            

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
                            this.customerByGender.updateOptions(this.customerByGenderOptions);
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
                                colors: isDark ? ['#0e1726'] : ['#e0e0e0'], // <-- WRAP IN ARRAY
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
                            },
                            dataLabels: {
                                enabled: true, // <--- ENABLE datalabels to show percentage on each slice
                                
                            },
                            stroke: {
                                show: true,
                                width: 20,
                                colors: isDark ? ['#0e1726'] : ['#e0e0e0'], // <-- WRAP IN ARRAY
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

                    get customerByGenderOptions() {
                        return {
                            series: formattedGenderPercentage,
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
                                colors: isDark ? ['#0e1726'] : ['#e0e0e0'], // <-- WRAP IN ARRAY
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
                            labels:gender,
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
