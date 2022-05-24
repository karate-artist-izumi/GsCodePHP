// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
import { getDatabase, ref, push, set, onChildAdded, remove, onChildRemoved } 
from "https://www.gstatic.com/firebasejs/9.8.1/firebase-database.js";
// Your web app's Firebase configuration
const firebaseConfig = {
apiKey: ig_apiKey,
authDomain: ig_authDomain,
databaseURL: ig_databaseURL,
projectId: ig_projectId,
storageBucket: ig_storageBucket,
messagingSenderId: ig_messagingSenderId,
appId: ig_appId
};
const app = initializeApp(firebaseConfig);
const db  = getDatabase(app); //RealtimeDBに接続


//FireBaseテスト用
const dbtest = ref(db,"test");

//test用
$("#firetest").on("click",function() {
const msg = {
    uname : $("#uname").val(),
    text : $("#text").val()
}
const testpost = push(dbtest)
set(testpost, msg);
});


//最初にデータ取得＆onSnapshotでリアルタイムにデータを取得
onChildAdded(dbtest, function(data){   
    const msg  = data.val();    //オブジェクトデータを取得し、変数msgに代入
    const key  = data.key;      //データのユニークキー（削除や更新に使用可能）
    let h = `<p id="${key}">名前:${msg.uname}<br>内容:${msg.text}<button id="${key}" class="del">削除</button></p>`;
    $("#output").append(h); //#outputの最後に追加
});

//firebaseのデータ削除
$("#output").on("click" , ".del" , function(){
    //attrメソッドでidを抜き出す
    const key = $(this).attr('id');
    remove(ref(db,`test/${key}`));
    });

//削除読み込み
onChildRemoved(dbtest, function(data){
    const key  = "#"+data.key;
    $(key).remove();
    });


// //ログイン用
// const dblog = ref(db,"log");

// $("#logsave").on("click",function() {

//     let today = new Date();
//     let y = today.getFullYear();
//     let m = today.getMonth()+1;
//     let d = today.getDate();
//     let rand = Math.ceil(Math.random()*1000000);
//     let ukey = `${y}${m}${d}${rand}`;
//     let logname = $("#logname").val();
//     localStorage.setItem(ukey,logname);

//     const logmsg = {
//         logname : $("#logname").val(),
//         logpass : $("#logpass").val()
//     }
//     const logpost = push(dblog)
//     set(logpost,logmsg);
//     window.location.href = ("canvas_firebase.html");
//     });

// $("#hyouzi").on("click",function(){
//     // getDatabase(dblog, function(data){   
//     //     const logmsg  = data.val();    //オブジェクトデータを取得し、変数msgに代入
//     //     const key  = data.key;      //データのユニークキー（削除や更新に使用可能）
//     //     alert(`${logmsg.logname}`);
//     const log = localStorage.getItem("ukey");
//     alert(log);
//     });



//canvas用
const dbRef = ref(db,"borad"); 

//canvas
let canvas_mouse_event = false;
let oldX = 0;
let oldY = 0;

let bold_line = 3;
$("#size").on("change",function(){
    const line_v = $(this).val();
    bold_line = line_v;
});

let color = "#000000";
$("#iro").on("change",function(){
    const color_v = $(this).val();
    color = color_v;
});

const can = document.getElementById("drowarea");
const ctx = can.getContext("2d");

$(can).on("mousedown",function(e){
    oldX = e.offsetX;
    oldY = e.offsetY;
    canvas_mouse_event=true;
});

$(can).on("mousemove",function(e){
    if(canvas_mouse_event==true){
            const px = e.offsetX;
            const py = e.offsetY;
            ctx.strokeStyle = color;
            ctx.lineWidth = bold_line;
            ctx.beginPath();
            ctx.lineJoin= "round";
            ctx.lineCap = "round";
            ctx.moveTo(oldX, oldY);
            ctx.lineTo(px, py);
            ctx.stroke();
            oldX = px;
            oldY = py;
        }
});

$(can).on("mouseup",function(){
    canvas_mouse_event=false;
});

$("#clear").on("click",function(){
    ctx.beginPath();
    ctx.clearRect(0, 0, can.width, can.height);
});


function chgImg(){
    const png = can.toDataURL();
    document.getElementById("newImg").src = png;
}

$("#save").on("click",function(){
    chgImg();
    
});


// //データ登録(Click)
// $("#save").on("click",function() {
//     const data = {
//         name : $("#uname").val(),
//         draw : $("#text").val()
//     }
//     const post = push(dbRef)
//     set(post, data);
// });

// const up = document.getElementById("up");
// up.addEventListener("click",() => {
//     const file = document.getElementById("fileButton").file[0];
// });

// let storageRef = firebase.storage().ref();

// let metadata = {
//     contentType: "image/",
// }

// const uploadTask = storageRef.child("image/" + file.name).put(file, metadata);
// console.log(uploadTask);
