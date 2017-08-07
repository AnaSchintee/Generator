
The Generator is used to generate a new json data based on a predefined format and rules described below. The data is generated with the 
help of the Faker library (https://github.com/fzaninotto/Faker).

Example input:
{<br />
  "id": "{{ integer(1, 10) }}", <br />
  "string": " {{ string(<length>1)}} ", <br />
  "float": "{{ float(1.0, 10.0)}}",<br />
  "name": " {{ firstname() }} {{ firstname() }} ",<br />
  "firstname": " {{ firstname() }} ",<br />
  "lastname": " {{ lastname() }} ",<br />
  "username": " {{ username() }} ",<br />
  "email": " {{ email() }} ",<br />
  "boolean": " {{ boolean() }} "<br />
}

Example output:
 {<br />
   "id":6,<br />
   "string":" vel ",<br />
   "float":7.4480886599999998,<br />
   "name":" Stella Buster Gerlach ",<br />
   "firstname":" Clay ",<br />
   "lastname":" Rath ",<br />
   "username":" mueller.brandi ",<br />
   "email":"keeley26@gmail.com",<br />
   "boolean":true<br />
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
 
