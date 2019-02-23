package main

import (
	"github.com/kainonly/api.van-team.com/controller"
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

var (
	err error
)

func main() {
	app := iris.New()
	mvc.New(app.Party("system")).
		Handle(controller.NewIndex()).
		Handle(controller.NewAdmin())

	if err = app.Run(
		iris.Addr(":8080"),
		iris.WithoutServerError(iris.ErrServerClosed),
	); err != nil {
		panic(err.Error())
	}
}
