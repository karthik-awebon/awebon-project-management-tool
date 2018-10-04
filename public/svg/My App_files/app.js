// Dom7
var $$ = Dom7;

// Framework7 App main instance
var app  = new Framework7({ // TO-DO Remove and change options that are needed
  root: '#app', // App root element
  id: 'io.framework7.testapp', // App bundle ID
  name: 'Framework7', // App name
  theme: 'auto', // Automatic theme detection
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
      },
    };
  },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
    onSignOut() {
      console.log('onSignOut');
      firebase.auth().signOut().then(function() {
        this.$router.navigate('/');
      })
    }
  },
  // App routes
  routes: routes,
  // Enable panel left visibility breakpoint
  panel: {
    // leftBreakpoint: 960,
  },
});

// Init/Create main view
var mainView = app.views.create('.view-main', {
  url: '/'
});

$$(document).on('page:init', function (e) {
  console.log('page init');
  var page = e.detail.page;
  if (page != 'login') {
    firebase.auth().onAuthStateChanged(user => {
      console.log(user);
      if (!user) {
        console.log('no user');
      }
    });
  }
});
