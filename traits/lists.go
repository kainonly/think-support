package traits

import (
	"github.com/kataras/iris"
)

type (
	listsCycle struct {
		ListsBeforeHooks  func()
		ListsCustomReturn func(interface{}, int)
	}
)

func (c *Traits) listsModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
