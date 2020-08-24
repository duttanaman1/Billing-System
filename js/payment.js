(function ($, win) {
  var ccName = $("input.cc-name"),
    ccNumber = $("input.cc-number"),
    ccExpiry = $("input.cc-expiry"),
    ccCVC = $("input.cc-cvc");

  $("[data-numeric]").payment("restrictNumeric");

  ccNumber.payment("formatCardNumber");
  ccExpiry.payment("formatCardExpiry");
  ccCVC.payment("formatCardCVC");

  ccName
    .on("focus", function () {
      $(this).data("placeholder", $(this).attr("placeholder"));
      $(this).attr("placeholder", "Name Surname");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).data("placeholder"));
    });

  ccNumber
    .on("focus", function () {
      $(this).data("placeholder", $(this).attr("placeholder"));
      $(this).attr("placeholder", "xxxx xxxx xxxx xxxx");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).data("placeholder"));
    })
    .on("change paste input", function () {
      var $el = $(this),
        num = $el.val(),
        type = $.payment.cardType(num),
        valid = $.payment.validateCardNumber(num);
      console.log(type, valid);
      if (
        type == "visa" ||
        type == "mastercard" ||
        type == "discover" ||
        type == "amex"
      ) {
        if (!$("#" + type).hasClass("active")) {
          $(".card_type").removeClass("active");
          $("#" + type).addClass("active");
        }
      } else {
        $el.removeClass("valid").removeClass("invalid");
        $(".card_type").removeClass("active");
      }
      if (
        valid &&
        (type == "visa" ||
          type == "mastercard" ||
          type == "discover" ||
          type == "amex")
      ) {
        var name = $("#cc-name"),
          exp = $("#cc-expiry");

        $el.removeClass("invalid").addClass("valid");
      } else if (String(num).length >= 19) {
        $el.addClass("invalid");
      }
    });

  ccExpiry
    .on("focus", function () {
      $(this).data("placeholder", $(this).attr("placeholder"));
      $(this).attr("placeholder", "MM/YY");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).data("placeholder"));
    });

  ccCVC
    .on("focus", function () {
      $(this).data("placeholder", $(this).attr("placeholder"));
      $(this).attr("placeholder", "xxx");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).data("placeholder"));
    });

  $("#submit-button").on("click", function () {
    $("#card-checkout").slideUp(200, function () {
      $("#loading").fadeIn();
      setTimeout(function () {
        $("#loading").fadeOut(function () {
          $("#success").prepend(
            '<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle className="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path className="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>'
          );
          $("#success").slideDown();
        });
      }, 2000);
    });
    return false;
  });
})(jQuery, window);
