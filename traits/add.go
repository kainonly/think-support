package traits

import (
	"github.com/kataras/iris"
)

type (
	addCycle struct {
		AddBeforeHooks func()
		AddAfterHooks  func(interface{})
	}
)

func (c *Traits) addModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
