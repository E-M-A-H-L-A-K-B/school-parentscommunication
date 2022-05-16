<html>

<head>
    <title> Html CRUD with Pure JavaScript </title>
    <link rel="stylesheet" href="addclass.css">
</head>

<body>


    <table class="list" id="employeeList">
        <caption>
            present classes
        </caption>
        <thead>
            <tr>
                <th>class Name</th>
                <th></th>




            </tr>

            <tbody> </tbody>
    </table>


    <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">
        <div>


            <input type="submit" value="Add New class"> </div>
        <label class="validation-error hide" id="fullNameValidationError">This field is required.</label>

        <input type="text" name="fullName" id="fullName">
        </div>





        <div class="form-action-buttons">

    </form>




    <script src="addclass.js"></script>
</body>

</html>