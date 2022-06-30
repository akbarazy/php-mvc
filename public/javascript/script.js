$(function () {
  $(".addFriend").on("click", function () {
    $("#titleModal").html("New Friend");
    $("#name").val("");
    $("#age").val(1);
  });

  $(".editFriend").on("click", function () {
    $("#titleModal").html("Edit Friend");

    $(".modal-footer button[type=submit]").html("Edit Now");
    $(".modal-body form").attr(
      "action",
      "http://localhost/php-mvc/public/friend/edit"
    );

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/php-mvc/public/friend/getEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#name").val(data.name);
        $("#age").val(data.age);
      },
    });
  });
});
