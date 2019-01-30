package router

import (
	"github.com/kainonly/Iris-bit/src/system/controller"
	"github.com/kataras/iris/mvc"
)

func System(app *mvc.Application) {
	app.Handle(new(controller.IndexController))
}
