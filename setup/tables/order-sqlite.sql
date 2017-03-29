create table `order` (
  id integer primary key not null,
  user_id integer key not null,
  created_at datetime not null,
  foreign key(user_id) references user(id)
);
