var config = {
    apiKey: "AIzaSyBXYhAsvOk8hjJUQ4wDgXf4uMUU_sGmpUg",
    authDomain: "appymum-84fb0.firebaseapp.com",
    databaseURL: "https://appymum-84fb0.firebaseio.com",
    projectId: "appymum-84fb0",
    storageBucket: "appymum-84fb0.appspot.com",
    messagingSenderId: "545146362609"
  };
firebase.initializeApp(config);

// let app;
// firebase.auth().onAuthStateChanged(function(user) {
//     if (!app) {
//         /* eslint-disable no-new */
//         app = new Vue({
//             el: '#app',
//             beforeCreate: function() {
//                 firebase.auth().onAuthStateChanged((user) => {
//                     if (user) {
//                         const self = this
//                         firebase.firestore().collection('users').doc(firebase.auth().currentUser.email).get().then((doc) => {
//                             console.log(doc.data())
//                             self.user = doc.data()
//                         })
//                     }
//                     this.loading = false
//                 })
//             },
//             data: () => ({
//                 user: null,
//                 loading: true,
//                 chat_room_id: '',
//                 toolbar_type: true,
//                 toolbar_name: ''
//             }),
//             router,
//             render: h => h(App)
//         });
//     } // end !app
// });
