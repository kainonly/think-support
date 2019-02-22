package traits

import (
	"github.com/kataras/iris"
)

type (
	deleteCycle struct {
		DeleteBeforeHooks func()
		DeletePrepHooks   func()
		DeleteAfterHooks  func()
	}
)

func (c *Traits) deleteModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
