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
	/** Components **/
		// QAjaxBar,
		QAlert,
	// QAutocomplete,
	QBtn,
	// QBtnDropdown,
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
	// QCheckbox,
	// QChip,
	QCollapsible,
	QDialog,
	QEditor,
	QField,
	QIcon,
	QInnerLoading,
	QInput,
	QItem,
	QItemMain,
	QItemSeparator,
	QItemSide,
	QItemTile,
	QLayout,
	QLayoutDrawer,
	QLayoutFooter,
	QLayoutHeader,
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
	QSpinner,
	// QSpinnerBars,
	// QSpinnerGears,
	QTable,
	// QTableColumns,
	QTd,
	// QTh,
	// QTr,
	QTab,
	QTabPane,
	QTabs,
	// QTimeline,
	// QTimelineEntry,
	// QToggle,
	QToolbar,
	QToolbarTitle,
	// QTooltip,

	/** Directives **/
	// Ripple,
	// CloseOverlay,

	/** Plugins **/
		// AppVisibility,
		Dialog,
	Notify,
	Cookies,

	/** Helpers **/
	openURL,
	extend
} from 'quasar-framework/dist/quasar.mat.esm.js'


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
		// QBtnDropdown,
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
		// QCheckbox,
		// QChip,
		QCollapsible,
		QDialog,
		QEditor,
		QField,
		QIcon,
		QInnerLoading,
		QInput,
		QItem,
		QItemMain,
		QItemSeparator,
		QItemSide,
		QItemTile,
		QLayout,
		QLayoutDrawer,
		QLayoutFooter,
		QLayoutHeader,
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
		QSpinner,
		// QSpinnerBars,
		// QSpinnerGears,
		QTable,
		// QTableColumns,
		QTd,
		// QTh,
		// QTr,
		QTab,
		QTabPane,
		QTabs,
		// QTimeline,
		// QTimelineEntry,
		// QToggle,
		QToolbar,
		QToolbarTitle,
		// QTooltip,
	},
	directives: {
		/** Directives **/
		// Ripple,
		// CloseOverlay
	},
	plugins: {
		/** Plugins **/
		//AppVisibility,
		Dialog,
		Notify,
		Cookies
	},
})
