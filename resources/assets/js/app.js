
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
import Vue from 'vue'

/** Polyfills for IE9 Support **/
//import 'quasar-framework/dist/quasar.ie.polyfills'

/** Quasar Fonts (Google Font)**/
import 'quasar-extras/roboto-font'

/** Quasar Icons (Material Icons) **/
import 'quasar-extras/material-icons'

/**
 * Quasar Components, Directives, Plugins & Helpers
 * http://quasar-framework.org
 * **/
import Quasar, {
    colors,
	/** Components **/
		// QAjaxBar,
		QAlert,
	// QAutocomplete,
	QBtn,
	QBtnDropdown,
	// QBtnGroup,
	QCard,
	QCardActions,
	QCardMain,
	QCardSeparator,
	QCardTitle,
	// QCarousel,
	// QCarouselControl,
	// QCarouselSlide,
	// QChatMessage,
	QCheckbox,
	// QChip,
	// QCollapsible,
	QDialog,
	// QEditor,
	QField,
	QIcon,
	QInnerLoading,
	QInput,
	QItem,
	QItemMain,
	QItemSeparator,
	QItemSide,
	QItemTile,
	// QLayout,
	// QLayoutDrawer,
	// QLayoutFooter,
	// QLayoutHeader,
	QList,
	QListHeader,
	QModal,
	// QModalLayout,
	QPage,
	QPageContainer,
	// QProgress,
	// QPullToRefresh,
	// QRating,
	// QRadio,
	// QRouteTab,
	// QSlider,
	// QScrollArea,
	// QSearch,
	// QSelect,
	// QSpinner,
	// QSpinnerBars,
    // QSpinnerGears,
    QStepper,
    QStep,
    QStepperNavigation,
	// QTable,
	// QTableColumns,
	// QTd,
	// QTh,
	// QTr,
	// QTab,
	// QTabPane,
	// QTabs,
	// QTimeline,
	// QTimelineEntry,
	// QToggle,
	// QToolbar,
	// QToolbarTitle,
	// QTooltip,

	/** Directives **/
	// Ripple,
	CloseOverlay,

	/** Plugins **/
		// AppVisibility,
		Dialog,
	Notify,
	Cookies,

	/** Helpers **/
	openURL,
	extend
} from 'quasar-framework/dist/quasar.mat.esm.js'

colors.setBrand('primary', '#E2182D')
colors.setBrand('secondary', '#011E33')
/** Bind Quasar Helpers to Vue Methods **/
Vue.prototype.$openUrl = openURL
Vue.prototype.$objectExtend = extend

/** Quasar Components, Directives, Plugins & Helpers **/
Vue.use(Quasar, {
	components: {
		/** Components **/
		// QAjaxBar,
		QAlert,
		// QAutocomplete,
		QBtn,
		QBtnDropdown,
		// QBtnGroup,
		QCard,
		QCardActions,
		QCardMain,
		QCardSeparator,
		QCardTitle,
		// QCarousel,
		// QCarouselControl,
		// QCarouselSlide,
		// QChatMessage,
		QCheckbox,
		// QChip,
		// QCollapsible,
		QDialog,
		// QEditor,
		QField,
		QIcon,
		QInnerLoading,
		QInput,
		QItem,
		QItemMain,
		QItemSeparator,
		QItemSide,
		QItemTile,
		// QLayout,
		// QLayoutDrawer,
		// QLayoutFooter,
		// QLayoutHeader,
		QList,
		QListHeader,
		QModal,
		// QModalLayout,
		QPage,
		QPageContainer,
		// QProgress,
		// QPullToRefresh,
		// QRating,
		// QRadio,
		// QRouteTab,
		// QSlider,
		// QScrollArea,
		// QSearch,
		// QSelect,
		// QSpinner,
		// QSpinnerBars,
        // QSpinnerGears,
        QStepper,
        QStep,
        QStepperNavigation,
		// QTable,
		// QTableColumns,
		// QTd,
		// QTh,
		// QTr,
		// QTab,
		// QTabPane,
		// QTabs,
		// QTimeline,
		// QTimelineEntry,
		// QToggle,
		// QToolbar,
		// QToolbarTitle,
		// QTooltip,
	},
	directives: {
		/** Directives **/
		// Ripple,
		CloseOverlay
	},
	plugins: {
		/** Plugins **/
		//AppVisibility,
		Dialog,
		Notify,
		Cookies
	},
})


import router from './router';

/** Polyfills for IE9 Support **/
//import 'quasar-framework/dist/quasar.ie.polyfills'


import "quasar-framework/dist/umd/quasar.mat.css";
//import router from './router';
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Vue.prototype.$http = window.axios;

window.Vue = require('vue');
Vue.use(Quasar);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('addbook', require('./components/Addbook.vue'));

const app = new Vue({

    router
}).$mount('#app')
