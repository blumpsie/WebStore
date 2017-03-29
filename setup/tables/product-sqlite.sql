create table `product` (
  id integer primary key not null,
  name text unique not null collate nocase,
  category_id int not null, 
  price real not null,
  description text not null,
  photo_id int not null,
  foreign key(category_id) references category(id)
);
