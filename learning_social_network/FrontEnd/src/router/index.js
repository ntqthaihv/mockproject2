import Vue from 'vue'
import Router from 'vue-router'
import Attendance from '../components/Attendance.vue'
import Calendar from '../components/Calendar.vue'
import ListContent from '../components/ListContent.vue'
import Member from '../components/Member.vue'
import PendingItems from '../components/PendingItems.vue'
import slide_logout from '../components/slide_logout.vue'
import Show from '../components/Show.vue'



Vue.use(Router)
 export default new Router({
   routes: [
    {
      path: '/show',
      name: 'listcontent',
      component: ListContent
    },
    {
      path: '/user',
      name: 'listcontent',
      component: ListContent
    },
    {
      path: '/user/member', // đường dẫn
      name: 'member', // tên link
      component: Member
    },
    {
      path: '/user/attendance', // đường dẫn
      name: 'attendance', // tên link
      component: Attendance
    },
    {
      path: '/user/calendar', // đường dẫn
      name: 'calendaar', // tên link
      component: Calendar
    },
    {
      path: '/show', // đường dẫn
      name: 'show', // tên link
      component: Show
    },
    {
      path: '/', // đường dẫn
      name: 'app', // tên link
      component: slide_logout
    },
    {
      path: '/user/pendingitems', // đường dẫn
      name: 'pendingitems', // tên link
      component: PendingItems
    }
 ],
 mode:'history'
})
