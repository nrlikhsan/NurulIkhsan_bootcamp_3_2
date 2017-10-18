// component ini berfungsi untuk mengatur data yang berkaitan dengan room (available room, book room)

import { Component, OnInit } from '@angular/core';
import { Http, Headers, RequestOptions } from "@angular/http";
import { Observable } from "rxjs/Rx";

@Component({
  selector: 'app-room-list',
  templateUrl: './room-list.component.html',
  styleUrls: ['./room-list.component.css']
})
export class RoomListComponent implements OnInit {

  constructor(private http:Http) { }

  ngOnInit() {
  }

  RoomList : object[] = [{'room_name' : 'Room 101', 'availability' : true},{'room_name' : 'Room 102', 'availability' : true},{'room_name' : 'Room 103', 'availability' : true}];

  GetRoom() : object[] {
    var available : object[] = [];
    for (var i = 0; i < this.RoomList.length; i++) {
      var room = this.RoomList[i];
      if (room["availability"] == true) {
        available.push(room);
      }
    }
    return available;
  }
  
  Book(id) : void {
    for (var i = 0; i < this.RoomList.length; i++) {
      if (this.RoomList[i]['room_name'] == id) {
        this.RoomList[i]['availability'] = false;
        break;
      }
    }
  }

}
