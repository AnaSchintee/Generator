
The Generator is used to generate a new json data based on a predefined format and rules described below. The data is generated with the 
help of the Faker library (https://github.com/fzaninotto/Faker).

Example input:
{
  "id": "{{ integer(1, 10) }}",
  "string": " {{ string(<length>1)}} ",
  "float": "{{ float(1.0, 10.0)}}",
  "name": " {{ firstname() }} {{ firstname() }} ",
  "firstname": " {{ firstname() }} ",
  "lastname": " {{ lastname() }} ",
  "username": " {{ username() }} ",
  "email": " {{ email() }} ",
  "boolean": " {{ boolean() }} "
}

Example output:
 {
   "id":6,
   "string":" vel ",
   "float":7.4480886599999998,
   "name":" Stella Buster Gerlach ",
   "firstname":" Clay ",
   "lastname":" Rath ",
   "username":" mueller.brandi ",
   "email":"keeley26@gmail.com",
   "boolean":true
}

Format and rules:
The following predefined functions need to be used, for different data types generation:

- integer: {{ integer(1, 10) }}
- float: {{ float(1.0, 10.0)}}
- string: {{ string(<length>1)}}
- boolean: {{ boolean() }}
- name (combination of first name and last name) : {{ firstname() }} {{ firstname() }} 
- first name: {{ firstname() }}
- last name: {{ lastname() }}
- username: {{ username() }}
- email: {{ email() }}
 
