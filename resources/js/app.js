import './bootstrap';
// if (window.auth()) {
//     // Get the authenticated user's ID
//     const userId = window.User

// runs on page load to ask for permission
//     if (Notification.permission !== "denied" && Notification.permission !== "granted") {
//         Notification.requestPermission().then(permission => {
//             if (permission === "granted") {
//                 welcomeNotification()
//             }
//         })
//     }
//
//     function welcomeNotification() {
//         const notification = new Notification("Jobins", {
//             body: 'Thanks for subscribing!'
//         })
//     }
//
//
//     Echo.channel('posts')
//         .listen('PostCreatedEvent', (e) => {
//             const newPost = document.getElementById('NewPost')
//             newPost.innerText = Number(newPost.innerText) + 1
//             console.log(e)
//             pushNotification(e)
//         });
//
//     Echo.private('post-liked.' + 2)
//         .listen('PostLikedEvent', (e) => {
//             console.log(e.userName, e.postLink)
//             const newPost = document.getElementById('Likes')
//             newPost.innerText = Number(newPost.innerText) + 1
//             const payload = {
//                 body: `${e.userName} Liked your post`,
//                 url: e.postLink
//             }
//             pushNotification(payload)
//         });
//
//
//     function pushNotification(param) {
//         if (Notification.permission === "granted") {
//             showNotification(param);
//         } else if (Notification.permission !== "denied") {
//             Notification.requestPermission().then(permission => {
//                 if (permission === "granted") {
//                     showNotification(param)
//                 }
//             })
//         }
//     }
//
//     function showNotification(payload) {
//         const notification = new Notification("Jobins", {
//             body: payload.body,
//             icon: "/images/jobins.png",
//             data: {
//                 url: payload.url,
//             },
//         });
//         notification.onclick = function (event) {
//             event.preventDefault();
//             window.open(notification.data.url, "_blank");
//         };
//     }
// // }
