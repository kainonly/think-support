package main

import (
	"github.com/kainonly/Iris-bit/src/system/router"
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

func main() {
	app := iris.New()
	mvc.Configure(app.Party("system"), router.System)
	if e := app.Run(iris.Addr(":7001")); e != nil {
		print(e.Error())
	}
}
